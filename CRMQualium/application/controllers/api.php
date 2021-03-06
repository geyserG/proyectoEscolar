<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Api extends CI_Controller {

     public function __construct() {  parent::__construct();                  }

     public function request() 
    {
        switch ($this->metodo()) 
        {
            case     'post':   return 'create'; # POST
            case     'get':    return $this->metodo(); # GET 
            case     'delete': return $this->metodo(); # DELETE
            case     'patch':  return 'update';        # PATCH
            case     'put':    return 'update';        # PUT
            
            ###########METODO NO DEFINIDO###############
            default:  $this->response  ('',405);  exit; 
        }
    }
         
    # Recupera el nombre del metodo de la petición y lo convierte a minusculas...
    public function metodo(){ return strtolower($_SERVER['REQUEST_METHOD']);  }

    # Captura el primer segmento de la URL para cargar la vista...
    public function ruta()  {   return $this->uri->segment(1);                }
   
    # Captura el Segundo segmento de la URL tomar el id para get, update o delete...
    public function id()
    {
        $id = $this->uri->segment(2); 
        # La peticion fue get entonces retorna un $id = num o $id = NULL
        if($this->metodo()==='get'||$this->metodo()==='delete') return $id;       
        # La petición fue put O patch entonces validamos que el id sea un numero
        if($this->metodo()==='put'||$this->metodo()==='patch'){
            if(is_numeric($id)) return $id; 
            # Si no llega ningún ID para estas peticiones regresamos un 400 petición incorrecta...
            $this->response('ID Required', 400);
            exit;       
        }
    }

    public function area_Estatica($modulo, $var = FALSE)
    {
        $this->load->view('cabecra_y_menu.html');
        $this->load->view('header');
        $this->load->view('menu');            
        ($var===FALSE) ?  $this->load->view($modulo) : $this->load->view($modulo,$var); 
    }

    public function pre_response($query, $metod)
    {
        switch ($metod) 
        {
            case  'create': 
                    ( $query ) ? 
                    $this->response ( $query, 201 ) : 
                    $this->response ( 'Incorrect set of parameters', 406 ) ;
            break; 

            case  'get':   
                    ( $query ) ? 
                    $this->response(  $query,       200 ) : 
                    $this->response(  'No Content', 204 ) ;
            break;

            default:
                    ( $query ) ?
                    $this->response(  $query,       200 ) : 
                    $this->response(  'Incorrect set of parameters', 406 ) ;
            break;
        }
    }
    
    protected function response($data, $status)
    {  
        (is_numeric($data)) ? $response['id'] = $data : $response = $data;
        # Establece el codigo y el mensaje de estado de la cabecera de la respuesta...
         $this->output->set_status_header($status);
        # Establece el contenido de respuesta en este caso devolvemos JSON
         $this->output->set_content_type('application/json');
        # Regresamos el data en formato JSON...
        return $this->output->set_output(json_encode($response));       
    }   

    # Esta funcion verifica si llegaron las variables post de la manera normal $_POST['nombre'] O
    # Si llega como un arreglo de objetos en formato JSON lo decodifica... 
    protected function ipost()
    {   
        ( !( $this->input->post('model') ) ) ? $post = $this->validar($this->input->post())                            
                                             : $post = (array)json_decode($this->input->post('model'));  
      if(!$post){
        $this->response('Incorrect set of parameters', 406); exit;
      } 
      return $post;
      
    } # Fin del metodo ipost()...

    protected function put()
    {
        $obj = file_get_contents("php://input");
        # Si la petición put llega como json entonces lo decodifico   
        $obj2 = json_decode($obj); 
        
        if($obj||$obj2)
        {
            # Si es objeto lo convierte en array...
            if      (is_object($obj2))  {  $put = $this->validar(array($obj2));  }
            else                        {         parse_str($obj, $var);   
                                           $put = $this->validar($var);          }
            return  ($put) ? $put : false;
        }
        return FALSE;       

    } # Fin de la función put()...

    # Valida la petición CREATE y UPDATE
    protected function validar($args)
    {
        // var_dump($args); die();
        if(array_key_exists(0, $args)&&is_object($args[0])) 
        {
            $args = (array)$args[0];
        }
        $cont=0;
        foreach ($args as $key => $value) 
        {
            if($value) # ¿El Valor de la variable post['variable'] es verdadero?
            {
                $cont++; # Incrementamos el contador para saber que al menos tiene un dato
                # Limpiamos el valor de cada variable post de cualquier etiqueta html o php
                $datos[$key] = strip_tags($args[$key]);
                # Usamos la sig. función del CodeIgniter...
                $datos[$key] = $this->security->xss_clean($datos[$key]);               
            }
        }
        return ($cont>0) ? $datos: false; # Si $args tiene al menos un dato lo devolvemos 
    } # Fin de la función validar

} # Fin de la clase
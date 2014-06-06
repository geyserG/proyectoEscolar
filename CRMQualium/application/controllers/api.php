<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Api extends CI_Controller {

     public function __construct() {  parent::__construct();                  }
         
    # Recupera el nombre del metodo de la petición y lo convierte a minusculas...
    public function metodo(){ return strtolower($_SERVER['REQUEST_METHOD']);  }

    # Captura el primer segmento de la URL para cargar la vista...
    public function ruta()  {   return $this->uri->segment(1);                }
    
    # Captura el Segundo segmento de la URL tomar el id para get, update o delete...
    public function id(){  return $this->uri->segment(2);                     }

    # Carga las vistas por default y la vista presente
    public function area_Estatica($modulo, $var = FALSE)
    {
        $this->load->view('cabecra_y_menu.html');
        $this->load->view('header');
        $this->load->view('menu');       

        // if($var===FALSE){   $this->load->view($modulo);      }
        // else{               $this->load->view($modulo,$var); }
        return ($var===FALSE) ?  $this->load->view($modulo) : $this->load->view($modulo,$var); 
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

    # Esta funcion verifica si llegaron las variables post de la manera normal $_POST['nombre']
    # Si llega como un arreglo de objetos en formato JSON lo decodifica... 
    protected function ipost()
    {             
        return (!($this->input->post('model'))) ? $this->input->post() : 
                        (array)json_decode($this->input->post('model'));

    } # Fin del metodo ipost()...

    protected function put()
    {
        $obj = file_get_contents("php://input");
        # Si la petición put llega como json entonces lo decodifico   
        $obj2 = json_decode($obj); 

        # Si es objeto lo convierte en array...
        if(is_object($obj2))  { return array($obj2);    }
        
        # Si no es un objeto y es una cadena lo convierte a un array...
        parse_str($obj, $var);
        return $var;        
    } # Fin de la función put()...

} # Fin de la clase
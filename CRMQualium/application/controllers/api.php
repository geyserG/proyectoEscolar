<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Api extends CI_Controller {

     public function __construct() {
         parent::__construct();
         $this->load->library('My_functions');

        
     }
     private $_code = 200;

    public function metodo()
    {
        # Recupera el nombre del metodo y lo convierte a minusculas...
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function ruta()
    {   
        # Captura el primer segmento de la URL para cargar la vista...
        return $this->uri->segment(1);      
    }

    public function id()
    {   
        # Captura el primer segmento de la URL para cargar la vista...
        return $this->uri->segment(2);      
    }

    # Carga las vistas por default y la vista presente
    public function area_Estatica($modulo, $var = FALSE){

        $this->load->view('cabecra_y_menu.html');
        $this->load->view('header');
        $this->load->view('menu');       
        if($var===FALSE)
        {     $this->load->view($modulo); }else{
            $this->load->view($modulo,$var);
        }
    }

    protected function response($data, $status)
    {   
        $this->_code = ($status) ? $status : 200; 
        $this->set_headers();        
        (is_numeric($data)) ? $response['id'] = $data : $response = $data;
         echo json_encode($response); 
        exit;        
    }   
    
    # Codigo de Respuesta despues de una petición...
    protected function requestStatus() 
    {
        $status = array(  
            200 => 'OK',
            201 => 'Created',
            204 => 'No Content',
            302 => 'Found',   
            304 => 'Not Modified',
            404 => 'Not Found', 
            406 => 'Not Acceptable',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        # Regresa el nombre del codigo de status...
        #foreach ($status as $key => $value) { if($key==$code){ return $value; } } # foreach
        return ( $status[$this->_code]) ? $status[$this->_code] : $status[500];
        
    }  

    # Establece la cabecera de respuesta.
    private function set_headers(){
             
        header("HTTP/1.1 ".$this->_code." ".$this->requestStatus());
        header("Content-Type: application/json");
            
    }
       // return (object)$this->input->post();
    protected function ipost()
    {
        # Esta funcion verifica si llegaron las variables post de la manera normal $_POST['nombre']
        # Si llega como un arreglo de objetos en formato JSON lo decodifica...       
        if(!($this->input->post('model')))
        {     
            return $this->input->post();
        }
        else
        {            
            $resp = json_decode($this->input->post('model'));
            return (array)$resp;
        }
    } # Fin del metodo ipost()...

    protected function put()
    {
        $obj = file_get_contents("php://input");        
        # Si la petición put llega como json
        # entonces lo decodifico   
        $obj2 = json_decode($obj);
        # pregunta si es un objetos retorna la ejecución del metdo get_put()
        # Este prepara un arreglo asociativo.
        if(is_object($obj2))
        {
           return array($obj2);         
        }
        else
        {
           # Si no es un objeto y es una cadena lo convierte a un array...
           parse_str($obj, $var);
           return $var;
        }              
    } # Fin de la función put()...

} # Fin de la clase

    // protected function put(){

    //     $obj = file_get_contents("php://input");
        
    //     # Si la petición put llega como json
    //     # entonces lo decodifico   
    //     $obj2 = json_decode($obj);

    //     # pregunta si es un objetos retorna la ejecución del metdo get_put()
    //     # Este prepara un arreglo asociativo.
    //      if(is_object($obj2)){
    //         return $obj2;
            
    //         // foreach ($put as $key => $value) {
            
    //         //         $array[$key] = $value;
    //         // }
    //      }else{
    //         # Si no es un objeto y es una cadena lo convierte a un array...
    //         parse_str($obj, $var);
    //         return $var;
    //      }       
       
    // }


    // protected function put(){

    //     $obj = file_get_contents("php://input");
        
    //     # Si la petición put llega como json
    //     # entonces lo decodifico   
    //     $obj2 = json_decode($obj);

    //     # pregunta si es un array de objetos, en caso de true lo asigna a $var
    //      if(is_object($obj2)){
            
    //         return $this->get_put($obj2);
    //      }else{
    //         # Si no es un objeto y es una cadena lo convierte a un array...
    //         parse_str($obj, $var);
    //         // $var = (object)$var;
    //         return $this->get_put($var);
    //      }       
       
    // }
   
    



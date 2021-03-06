<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Representante extends Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_representante', 'rep');             
    }

    public function api() 
    {
        $metodo = $this->request();
        $this->$metodo();
    }

    private function create()
    {
        $query = $this->rep->create_rep(  $this->ipost()  );
        # El metodo pre_response() establece el codigo de respuesta y acepta dos parametros 
        # El resultado de la $query y el metodo que se acaba de ejecutar...
        $this->pre_response($query, 'create');        
    }

    private function get()
    {
        $query = $this->rep->get_rep( $this->id() ); 
        $this->pre_response($query, 'get');     
    }

    private function update()
    {
        $query = $this->rep->update_rep(  $this->id(), $this->put()  );
        $this->pre_response($query, 'update');  
    }

    private function delete()
    {
        $query = $this->rep->delete_rep(  $this->id()  ); 
       $this->pre_response($query, 'delete');  
    }   
} # Fin de la Clase Api_contacto
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Roles extends Api {

	public function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_rol', 'rol');             
    }

    public function api() 
    {
        $metodo = $this->request();
        $this->$metodo();
    }
    
    private function create()
    {
        $query = $this->rol->create_rol(  $this->ipost()  );
        $this->pre_response($query, 'create');                  
    }

    private function get()
    {
        $query = $this->rol->get_rol( $this->id() ); 
        $this->pre_response($query, 'get'); 
    }

    private function update()
    {
        $query = $this->rol->update_rol(  $this->id(), $this->put()  );
        $this->pre_response($query, 'update');                 
    }

    private function delete()
    {
        $query = $this->rol->delete_rol(  $this->id()  ); 
        $this->pre_response($query, 'delete');        
    }   
} # Fin de la Clase Api_cliente
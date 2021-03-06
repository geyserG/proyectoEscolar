<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  ServiciosInteres extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_serviciosInteres', 'servint');             
    }

    public function api() 
    {
        $metodo = $this->request();
        $this->$metodo();
    }
    
    private function create()
    {
        $query = $this->servint->insert_servInteres($this->ipost());
        $this->pre_response($query, 'create');                  
    }

    private function get($id){

    	$query = $this->servint->get_servInteres($id);                        
    	$this->pre_response($query, 'get'); 
    	
    }

    private function update($id){

    	$query = $this->servint->update_servInteres($id, $this->put());
        $this->pre_response($query, 'update');         
    }

    private function delete($id){

    	$query = $this->servint->delete_servInteres($id);    	
        $this->pre_response($query, 'delete'); 
    }

} # Fin de la Clase Api_cliente
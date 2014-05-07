<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  ServiciosCliente extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_servicioCliente', 'servicio');             
    }

    public function api() 
    {     
    	switch ($this->metodo()) 
        {
    		case      'post':	$this->insert_servCliente();    		break; # POST
    		case      'get':	$this->get_servCliente($tis->id());    	break; # GET	
    		case      'put':    $this->update_servCliente($tis->id());  break; # PUT	
    		case      'delete':	$this->delete_servCliente($tis->id());  break; # DELETE
    		default:		    $this->response('',405);    			break; # METODO NO DEFINIDO...
    	}

    }
    
    private function insert_servCliente(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->servicio->insert_servCliente($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_servCliente($id){

    	$query = $this->servicio->get_servCliente($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_servCliente($id){

        $put = $this->put();
    	$query = $this->servicio->update_servCliente($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_servCliente($id){

    	$query = $this->servicio->delete_servCliente($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
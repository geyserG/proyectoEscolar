<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  ServiciosInteres extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_serviciosInteres', 'servint');             
    }

    public function api() 
    {
        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);  
    	switch ($this->metodo()) 
        {
    		case      'post':	$this->insert_si();		        break;
    		case      'get':	$this->get_si($this->id());		break;	
    		case      'put':    $this->update_si($this->id());	break;	
    		case      'delete':	$this->delete_si($this->id());	break;
    		default:		    $this->response('',405);        break;
    	}
    }
    
    private function insert_si()
    {
        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->servint->insert_servInteres($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_si($id){

    	$query = $this->servint->get_servInteres($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_si($id){

        // $put = $this->put();
    	$query = $this->servint->update_servInteres($id, $this->put());
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_si($id){

    	$query = $this->servint->delete_servInteres($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
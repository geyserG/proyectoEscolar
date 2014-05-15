<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Contacto extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_contact', 'contacto');             
    }

    public function api() 
    {   # La funcion id(), obtiene el id de la petición, get(), update(), delete()        
    	switch ($this->metodo()) 
        {
    		case    'post':   $this->insert_contacto();      	    break; # POST
    		case    'get':	  $this->get_contactos($this->id());    break; # GET
    		case    'put':    $this->update_contacto($this->id());  break; # PUT
    		case    'delete': $this->delete_contacto($this->id());  break; # DELETE
    		default:      	  $this->response('',405);    		    break; # METODO NO DEFINIDO...
    	}
    }
    
    private function insert_contacto(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->contacto->insert_C($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_contactos($id){

    	$query = $this->contacto->get_C($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_contacto($id){

        $put = $this->put();
    	$query = $this->contacto->update_C($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_contacto($id){

    	$query = $this->contacto->delete_C($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_contacto
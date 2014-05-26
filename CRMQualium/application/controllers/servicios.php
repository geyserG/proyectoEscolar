<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Servicios extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_servicios', 'serv');             
    }

    public function api() 
    {    
    	switch ($this->metodo()) 
        {
    		case     'post':	$this->insert_serv();  			   break; # POST
    		case     'get':   	$this->get_servs($this->id());     break; # GET	
            case     'patch':   $this->patch_serv($this->id());   break; # GET
    		case     'put':     $this->update_serv($this->id());   break; # PUT	
    		case     'delete':	$this->delete_serv($this->id());   break; # DELETE
    		default:           	$this->response('',405);  		   break; # METODO NO DEFINIDO...
    	}
    }
    
    private function insert_serv(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...  
        $query = $this->serv->insert_s($this->ipost());
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_servs($id){

    	$query = $this->serv->get_s($id);                        
    	($query) ? $this->response($query, 200) : $this->response($query, 404);
    	
    }

    private function patch_serv($id){

        $put = $this->put();
        $query = $this->serv->patch_s($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function update_serv($id){

        $put = $this->put();
    	$query = $this->serv->update_s($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_serv($id){

    	$query = $this->serv->delete_s($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
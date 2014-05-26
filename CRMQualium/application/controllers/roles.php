<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Roles extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_roles', 'roles');             
    }

    public function api() 
    {
    	switch ($this->metodo()) 
        {
    		case     'post':   $this->insertRol(); 	          break; # POST
    		case     'get':    $this->getRol($this->id());    break; # GET
    		case     'put':    $this->updateRol($this->id()); break; # PUT
            case     'patch':  $this->patchRol($this->id());  break; # PATCH
    		case     'delete': $this->deleteRol($this->id()); break; # DELETE
    		default:           $this->response('',405);       break; # METODO NO DEFINIDO
    	} # switch
    } # Fin del metodo api()
    
    private function insertRol()
    {   # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo... 
        
        $query = $this->roles->insertRol($this->ipost());
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function getRol($id)
    {  	
        $query = $this->roles->getRol($id);                        
    	($query) ? $this->response($query, 200) : $this->response($query, 404);   	
    }

    private function patchRol($id)
    {   
        $query = $this->roles->patchRol($id, $this->put());       
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

    private function updateRol($id)
    {
        $query = $this->roles->updateRol($id, $this->put());
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function deleteRol($id)
    {
    	$query = $this->roles->deleteRol($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

   

} # Fin de la Clase Api_cliente
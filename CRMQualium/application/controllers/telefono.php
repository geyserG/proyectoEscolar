<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Telefono extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_phone', 'phone');             
    }

    public function api() 
    {
    	switch ($this->metodo()) 
        {
    		case     'post':   $this->insert_phone(); 	          break; # POST
    		case     'get':    $this->get_phones($this->id());    break; # GET
    		case     'put':    $this->update_phone($this->id());  break; # PUT
            case     'patch':  $this->patch_phone($this->id());   break; # PATCH
    		case     'delete': $this->delete_phone($this->id());  break; # DELETE
    		default:           $this->response('',405);           break; # METODO NO DEFINIDO
    	} # switch
    } # Fin del metodo api()
    
    private function insert_phone(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->phone->insert_p($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_phones($id){

    	$query = $this->phone->get_p($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function patch_phone($id)
    {   
        $query = $this->phone->patch_p($id, $this->put());       
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

    private function update_phone($id)
    {
        $query = $this->phone->update_p($id, $this->put());
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_phone($id){

    	$query = $this->phone->delete_p($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

   

} # Fin de la Clase Api_cliente
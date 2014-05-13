<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Multimedia extends Api {

	public function __construct() {
        parent::__construct();
        // $this->load->model('Model_archivos', 'archivos');             
    }

    public function api() 
    {   # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);      
        switch ($this->metodo())
        {
    		case     'post':   $this->insert_mult();        break;
    		case     'get':    $this->get_mults($id);	    break;	
    		case     'put':    $this->update_mult($id);     break;	
    		case     'delete': $this->delete_mult($id);     break;
    		default:           $this->response('',405); 	break;
    	}
    }
    
    private function insert_mult(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        // $post = $this->ipost();         
        $query = $this->archivos->insert_mult();
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_phones($id){

    	$query = $this->mult->get_p($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_phone($id){

        $put = $this->put();
    	$query = $this->mult->update_p($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_phone($id){

    	$query = $this->mult->delete_p($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Multimedia
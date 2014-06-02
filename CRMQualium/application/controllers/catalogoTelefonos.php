<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
# Catalogo para el registro de los tipos de telefonos.
include 'api.php';
class  catalogoTelefonos extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_catalogoTelefonos', 'Ctel');             
    }

    public function api() 
    {
    	switch ($this->metodo()) 
        {
    		case     'post':   $this->insert_phone(); 	          break; # POST
    		case     'get':    $this->get_phones($this->id());    break; # GET
    		case     'put':    $this->update_phone($this->id());  break; # PUT
            case     'delete': $this->delete_phone($this->id());  break; # DELETE
    		default:           $this->response('',405);           break; # METODO NO DEFINIDO
    	} # switch
    } # Fin del metodo api()
    
    private function insert_phone(){
        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...        
        $query = $this->Ctel->insert_p($this->ipost());
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_phones($id){

    	$query = $this->Ctel->get_p($id);                        
    	($query) ? $this->response($query, 200) : $this->response('Not Found', 404);
    	
    }

    private function update_phone($id)
    {
        $query = $this->Ctel->update_p($id, $this->put());
        ($query) ? $this->response($query, 200) : $this->response('Not Modified', 304);        
    }

    private function delete_phone($id){

    	$query = $this->Ctel->delete_p($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

   

} # Fin de la Clase Api_cliente
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Cotizaciones extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_cotizaciones', 'cotizacion');             
    }

    public function api() 
    {   # El metodo $this->id devuelve el id para las peticiones get(), update(), delete()   
    	switch ($this->metodo()) 
        {
    	    case     'post':   $this->insert_cotizacion();             break; # POST
    		case     'get':    $this->get_cotizacion($this->id());     break; # GET
    		case     'put':    $this->update_cotizacion($this->id());  break; # PUT
    		case     'delete': $this->delete_cotizacion($this->id());  break; # DELETE
    		default:           $this->response('',405);        		   break; # Función Inexistente
    	}
    } # Fin de la funcion api()...
    
    private function insert_cotizacion(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->cotizacion->insert_cotizacion($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_cotizacion($id){

    	$query = $this->cotizacion->get_cotizacion($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_cotizacion($id){

        $put = $this->put();
    	$query = $this->cotizacion->update_cotizacion($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_cotizacion($id){

    	$query = $this->cotizacion->delete_cotizacion($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
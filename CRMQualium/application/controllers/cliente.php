<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Cliente extends Api {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_customer', 'Customer');
    }

    public function api() 
    {
        switch ($this->metodo()) 
        {
            case    'post':   $this->insert_c();            break; # POST
            case    'get':    $this->get_customers();       break; # GET
            case    'patch':  $this->patch_c($this->id());  break; # PATCH
            case    'put':    $this->update_c($this->id()); break; # PUT
            case    'delete': $this->delete_c($this->id()); break; # DELETE
            default:          $this->response('405');       break; # Metodo no definido...
        }
    }

    private function insert_c()
    { 
        # La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->Customer->insert_customer($this->ipost());
        ($query) ? $this->response($query, 201) : $this->response($query, 404);                 
    }

    private function get_customers()
    {
       $query = $this->Customer->get_customers($this->ruta()); 

       ($query) ? $this->response($query, 200) : $this->response($query, 404);
    }

    private function patch_c($id)
    {   
        $query = $this->Customer->patch_customer($id, $this->put());
        ($query)? $this->response($query, 200) : $this->response($query, 406);
    }

    private function update_c($id)
    {        
        # La función put(); Devuelve el array con los campos espicificos para actualizar              
        $query = $this->Customer->update_customer($id, $this->put());
             
        ($query) ? $this->response($query, 200) : $this->response($query, 304);        
    }

    private function delete_c($id)
    {
        $query = $this->Customer->delete_customer($id);
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
    }

} # Fin de la Claase Api_cliente


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  ServicioCotizado extends Api {

    # sc = Servicio Cotizado
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Modelo_servicioCotizado', 'servCotizado');
    }

    public function api() 
    {
        switch ($this->metodo()) 
        {
            case    'post':   $this->insert_sc();            break; # POST
            case    'get':    $this->get_sc($this->id());    break; # GET
            case    'patch':  $this->patch_sc($this->id());  break; # PATCH
            case    'put':    $this->update_sc($this->id()); break; # PUT
            case    'delete': $this->delete_sc($this->id()); break; # DELETE
            default:          $this->response('405');        break; # Metodo no definido...
        }
    }

    private function insert_sc()
    { 
        # La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->servCotizado->insert_servicioCotizado($this->ipost());
        ($query) ? $this->response($query, 201) : $this->response($query, 404);                 
    }

    private function get_sc($id)
    {
       $query = $this->servCotizado->get_servicioCotizado($id); 

       ($query) ? $this->response($query, 200) : $this->response($query, 404);
    }

    // private function patch_c($id)
    // {   
    //     $query = $this->servCotizado->patch_customer($id, $this->put());
    //     ($query)? $this->response($query, 200) : $this->response($query, 406);
    // }

    // private function update_c($id)
    // {        
    //     # La función put(); Devuelve el array con los campos espicificos para actualizar              
    //     $query = $this->servCotizado->update_customer($id, $this->put());
             
    //     ($query) ? $this->response($query, 200) : $this->response($query, 304);        
    // }

    // private function delete_c($id)
    // {
    //     $query = $this->servCotizado->delete_customer($id);
    //     ($query) ? $this->response($query, 200) : $this->response($query, 304);
    // }

} # Fin de la Claase Api_cliente


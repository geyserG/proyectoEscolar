<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Personal extends Api {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Modelo_personal', 'personal');       
    }

    public function api() 
    {
        switch ($this->metodo()) 
        {
            case     'post':   $this->insert_personal();             break; # POST
            case     'get':    $this->get_personal($this->id());     break; # GET 
            case     'patch':  $this->patch_personal($this->id());   break; # PATCH
            case     'put':    $this->update_personal($this->id());  break; # PUT 
            case     'delete': $this->delete_personal($this->id());  break; # DELETE
            default:           $this->response('405');               break; # Metodo no definido...
        }
    }

    private function insert_personal()
    {
        # La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->personal->insertPersonal($this->ipost());

        ($query) ? $this->response($query, 201) : $this->response($query, 404);                 
    }

    private function get_personal($id)
    {
       $query = $this->personal->getPersonal($id);
       ($query) ? $this->response($query, 200) : $this->response($query, 404);
    }

    private function patch_personal($id)
    {   
        $query = $this->personal->patchPersonal($id, $this->put());       
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

    private function update_personal($id)
    {        
        # La función put(); Devuelve el array con los campos espicificos para actualizar              
        $query = $this->personal->updatePersonal($id, $this->put());
             
        ($query) ? $this->response($query, 200) : $this->response($query, 304);        
    }

    private function delete_personal($id)
    {
        $query = $this->personal->deletePersonal($id);
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
    }

} # Fin de la Clase Api_cliente


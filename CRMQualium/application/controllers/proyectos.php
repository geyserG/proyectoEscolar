<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Proyectos extends Api {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Modelo_proyecto', 'proy');       
    }

    public function api() 
    {
        switch ($this->metodo()) 
        {
            case    'post':   $this->insert_proyecto();             break; # POST
            case    'get':    $this->get_proyecto($this->id());     break; # GET 
            case    'patch':  $this->patch_proyecto($this->id());   break; # PATCH
            case    'put':    $this->update_proyecto($this->id());  break; # PUT 
            case    'delete': $this->delete_proyecto($this->id());  break; # DELETE
            default:          $this->response(405);                 break; # Metodo no definido...
        }
    }

    private function insert_proyecto()
    {   
        
        #La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->proy->insertProyecto($this->ipost());
        ($query) ? $this->response($query, 201) : $this->response('error', 404);                 
    }

    private function get_proyecto($id)
    {
       $query = $this->proy->getProyecto($id); 
       ($query) ? $this->response($query, 200) : $this->response($query, 404);
    }

    private function patch_proyecto($id)
    {   
        $query = $this->proy->patchProyecto($id, $this->put());       
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

    private function update_proyecto($id)
    {        
        # La función put(); Devuelve el array con los campos espicificos para actualizar              
        $query = $this->proy->updateProyecto($id, $this->put());
             
        ($query) ? $this->response($query, 200) : $this->response($query, 304);        
    }

    private function delete_proyecto($id)
    {
        $query = $this->proy->deleteProyecto($id);
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
    }

} # Fin de la Clase Api_cliente


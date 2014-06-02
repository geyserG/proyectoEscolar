<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  RolesDeProyecto extends Api {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Modelo_proyectoRoles', 'proyRol');       
    }

    public function api() 
    {
        switch ($this->metodo()) 
        {
            case    'post':   $this->insert_proyRoles();             break; # POST
            case    'get':    $this->get_proyRoles($this->id());     break; # GET 
            case    'patch':  $this->patch_proyRoles($this->id());   break; # PATCH
            case    'put':    $this->update_proyRoles($this->id());  break; # PUT 
            case    'delete': $this->delete_proyRoles($this->id());  break; # DELETE
            default:          $this->response(405);                  break; # Metodo no definido...
        }
    }

    private function insert_proyRoles()
    {   # La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->proyRol->insertProyRol($this->ipost());
        ($query) ? $this->response($query, 201) : $this->response($query, 404);                 
    }

    private function get_proyRoles($id)
    {
       $query = $this->proyRol->getProyRol($id); 
       ($query) ? $this->response($query, 200) : $this->response($query, 404);
    }

    private function patch_proyRoles($id)
    {   
        $query = $this->proyRol->patchProyRol($id, $this->put());       
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

    private function update_proyRoles($id)
    {        
        # La función put(); Devuelve el array con los campos espicificos para actualizar              
        $query = $this->proyRol->updateProyRol($id, $this->put());
             
        ($query) ? $this->response($query, 200) : $this->response($query, 304);        
    }

    private function delete_proyRoles($id)
    {
        $query = $this->proyRol->deleteProyRol($id);
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
    }

} # Fin de la Clase Api_cliente


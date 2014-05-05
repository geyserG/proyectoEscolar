<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Permisos extends Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_permisos', 'perm');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);     

        switch ($this->metodo()) {
            case 'post':
                $this->insert_permisos();
                break;
            case 'get':
                $this->get_permisos($id);
                break;  
            case 'put':
                 $this->update_permisos($id);
                break;  
            case 'delete':
                $this->delete_permisos($id);
                break;
            default:
                $this->response('',405);
                break;
        }

    }
    
    private function insert_permisos(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost(); 
        $query = $this->perm->insert_perm($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_permisos($id){

        $query = $this->perm->get_perm($id);                        
        ($query) ? $this->response($query, 200) : $this->response($query, 404);
        
    }

    private function update_permisos($id){

        $put = $this->put();
        $query = $this->perm->update_perm($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_permisos($id){

        $query = $this->perm->delete_perm($id);        
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
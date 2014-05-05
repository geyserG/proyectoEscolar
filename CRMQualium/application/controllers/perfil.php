<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Perfil extends Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_perfil', 'perfil');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);     

        switch ($this->metodo()) {
            case 'post':
                $this->insert_perfil();
                break;
            case 'get':
                $this->get_perfil($id);
                break;  
            case 'put':
                 $this->update_perfil($id);
                break;  
            case 'delete':
                $this->delete_perfil($id);
                break;
            default:
                $this->response('',405);
                break;
        }

    }
    
    private function insert_perfil(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost(); 
        $query = $this->perfil->insert_perfil($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_perfil($id){

        $query = $this->perfil->get_perfil($id);                        
        ($query) ? $this->response($query, 200) : $this->response($query, 404);
        
    }

    private function update_perfil($id){

        $put = $this->put();
        $query = $this->perfil->update_perfil($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_perfil($id){

        $query = $this->perfil->delete_perfil($id);        
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
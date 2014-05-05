<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Usuarios extends Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_usuarios', 'user');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);     

        switch ($this->metodo()) {
            case 'post':
                $this->insert_usuarios();
                break;
            case 'get':
                $this->get_usuarios($id);
                break;  
            case 'put':
                 $this->update_usuarios($id);
                break;  
            case 'delete':
                $this->delete_usuarios($id);
                break;
            default:
                $this->response('',405);
                break;
        }

    }
    
    private function insert_usuarios(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost(); 
        $query = $this->user->insert_user($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_usuarios($id){

        $query = $this->user->get_user($id);                        
        ($query) ? $this->response($query, 200) : $this->response($query, 404);
        
    }

    private function update_usuarios($id){

        $put = $this->put();
        $query = $this->user->update_user($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_usuarios($id){

        $query = $this->user->delete_user($id);        
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente
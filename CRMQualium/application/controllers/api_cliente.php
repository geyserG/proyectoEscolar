<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class  Cliente extends CI_Controller {
include 'api.php';
class  Api_cliente extends Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_customer', 'Customer');
        $this->load->helper('url');
       
    }

    public function api() {

        $id = $this->uri->segment(2);   

        switch ($this->metodo()) {
            case 'post':
                $this->insert_c();
                break;
            case 'get':
                $this->get_customers();
                break;  
            case 'put':
                 $this->update_c($this->put_id());
                break;  
            case 'delete':
                $this->delete_c($id);
                break;
            default:
                $this->response('405');
                break;
        }

    }

    private function insert_c(){

        # La función ipost()... Recupera todos los post que viene desde la petición        
        $query = $this->Customer->insert_customer($this->ipost());

        ($query) ? $this->response($query, 201) : $this->response($query, 404);
                 
    }

    private function get_customers(){

       $query = $this->Customer->get_customers_model(); 

       ($query) ? $data['clientes'] = $this->response($query, 200) : $data['clientes'] = $this->response($query, 404);
    }

    private function update_c($id){
        
        # La función put(); Devuelve el array con los campos espicificos para actualizar              
        $query = $this->Customer->update_customer($id, $this->put());
             
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
        
    }

    private function delete_c($id){

        $query = $this->Customer->delete_customer($id);
        ($query) ? $this->response($query, 200) : $this->response($query, 304);
    }

} # Fin de la Clase Api_cliente


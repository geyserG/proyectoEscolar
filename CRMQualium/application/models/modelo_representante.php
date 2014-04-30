 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'model_phone.php';
    class Model_representante extends CI_Model
    {          

        function set_tel()
        {
            $obj = new model_phone();
            return $obj;
        }

        function insert_representate($post){
            
            $representante = array(
                                'nombre' => $post['nombre'],
                                'correo' => $post['correo'],
        						'cargo'	 => $post['cargo']
        					  );//Verificar si es un arreglo

            $query = $this->db->insert('representante',$representante);
            $id    = $this->db->insert_id();

            
            $data = array('idcliente'=> $post['idCliente'], 'idrepresentante'=>$id);
            $this->db->insert('representante_cliente', $data);

            $tel = $this->set_tel();
            $id_tel = $tel->insert_p($post['telefonos']);

            $tel = array('idrepresentante'=> $id, 'idtelefono'=>$id_tel);
            $this->db->insert_batch('telefonos_representante', $tel);

            ($query) ? ($id_tel) ? return true : return echo 'Error al registrar telefonos de representante' : return echo 'Error al registrar representante';
                       
        }

        function get_representante(){

                     $this->db->Select('nombre_completo, cargo, correo, telefonos.numero, telefonos.tipo');
                     $this->db->from('contacto');
                     $this->db->join('telefonos', 'telefonos.id= contacto.telefono_id');
            $query = $this->db->get();

            return $query->result_array();        	
        }

        function update_representante(){
        	
          $contactos = array(
                                'nombre_completo' => $this->input->post('nombre'),
                                'correo'          => $this->input->post('correo'),
                                'cargo'           => $this->input->post('cargo')
                              );//Verificar si es un arreglo

            $this->db->where('id', $id);
            $this->db->update('contacto', $contactos); 

        }
        private function delete_representante($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
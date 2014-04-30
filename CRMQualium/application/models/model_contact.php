 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'model_phone.php';
    class Model_contact extends CI_Model
    {          

        function set_tel()
        {
            $obj = new model_phone();
            return $obj;
        }

        function insert_mcontact($post){
            
            $contactos = array(
                                'nombre' => $post['nombre'],
                                'correo' => $post['correo'],
        						'cargo'	 => $post['cargo']
        					  );

            $query = $this->db->insert('contacto',$contactos);
            $id    = $this->db->insert_id();

            
            $data = array('cliente_id'=> $post['idCliente'], 'contacto_id'=>$id);
            $this->db->insert('contacto_cliente', $data);

            $tel = $this->set_tel();
            $id_tel = $tel->insert_p($post['telefonos']);

            $tel = array('contactos_id'=> $id, 'telefono_id'=>$id_tel);
            $this->db->insert('telefonos_contactos', $tel);

            return $id_tel;

            
        }

        function get_mcontact(){

                     $this->db->Select('nombre_completo, cargo, correo, telefonos.numero, telefonos.tipo');
                     $this->db->from('contacto');
                     $this->db->join('telefonos', 'telefonos.id= contacto.telefono_id');
            $query = $this->db->get();

            return $query->result_array();        	
        }

        function update_mcontact(){
        	
          $contactos = array(
                                'nombre_completo' => $this->input->post('nombreContacto'),
                                'correo'          => $this->input->post('correoContacto'),
                                'cargo'           => $this->input->post('cargoContacto')
                              );//Verificar si es un arreglo

            $this->db->where('id', $id);
            $this->db->update('contacto', $contactos); 

        }
        private function delete_mcontacto($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
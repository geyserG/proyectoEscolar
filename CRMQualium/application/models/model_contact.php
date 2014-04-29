 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    class Model_contact extends CI_Model
    {          

        function set_tel(){
            $obj = new model_phone();
            return $obj;
        }

        function insert_contact(){

            $contactos = array(
        						'nombre_completo' => $this->input->post('nombreContacto'),
                                'correo'		  => $this->input->post('correoContacto'),
        						'cargo'			  => $this->input->post('cargoContacto')
        					  );//Verificar si es un arreglo

            $query = $this->db->insert($contactos);
            $id    = $this->insert_id();

            $tel = set_tel();
            $tid = $tel->insert_p($post['telefono']);
            $data = array('contacto_id'=>$id, 'telefono_id'=>$tid);

            $this->db->insert->('telefonos_contactos', $data);

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
 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    class Model_contact extends CI_Model
    {  

        function insert_contact(){

            //TELEFONOS DEL CONTACTO.

            
            $telefonos = json_encode($this->input->post('telefonosContacto'));
            $id_tel = $this->db->insert_id($telefonos);

            //DATOS DE CONTACTOS        
        	$contactos = array(
        						'nombre_completo'	=> $this->input->post('nombreContacto'),
                                'telefono_id'       => $id_tel,
        						'correo'			=> $this->input->post('correoContacto'),
        						'cargo'				=> $this->input->post('cargoContacto')
        					  );//Verificar si es un arreglo

            //Verificar si es un arreglo           
            
            $this->db->insert_id($contactos);
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
                                'nombre_completo'   => $this->input->post('nombreContacto'),
                                'telefono_id'       => $id_tel,
                                'correo'            => $this->input->post('correoContacto'),
                                'cargo'             => $this->input->post('cargoContacto')
                              );//Verificar si es un arreglo

            $this->db->where('id', $id);
            $this->db->update('contacto', $contactos); 

        }
        function delete_mcontact(){

            $id = $this->input->post('id');
        	
        }
    }
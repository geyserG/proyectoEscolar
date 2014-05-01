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

        function insert_mcontact($contactos){
            
            // $contactos = array(
            //                     'nombre' => $post['nombre'],
            //                     'correo' => $post['correo'],
        				// 		'cargo'	 => $post['cargo']
        				// 	  );

            $query = $this->db->insert('contacto',$contactos);
            $id    = $this->db->insert_id();

            
            $data = array('cliente_id'=> $post['idCliente'], 'contacto_id'=>$id);
            $this->db->insert('contacto_cliente', $data);

            # Existe algún telefono?
            if(array_key_exists('telefonos', $post)){
                
                # Crea un objeto de tipo telefono...
                $tel = $this->set_tel();
                # Envia la variable $post['telefono'] al modelo telefonos...
                $id_tel = $tel->insert_p($post['telefonos']);


                # ahora envía el id contacto y telefono para relacionar contacto y telefono...
                if(is_array($id_tel)){
                        
                    # ahora envía el id contacto y telefono para relacionar contacto y telefono...
                    for ($i=0; $i<count($id_tel); $i++) { 
                       $var[$i] = array('contacto_id'=> $id, 'telefono_id'=>$id_tel[$i]);                        
                    } 
                     $this->db->insert_batch('telefonos_contactos', $var);
                                                       
                }else{
                       $this->db->insert('telefonos_contactos', array('contacto_id'=> $id, 'telefono_id'=>$id_tel));
                }
                 
             }


            return true;
            
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
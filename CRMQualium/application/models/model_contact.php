 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'modelo_rit.php';
    class Model_contact extends CI_Model
    {          

        function insert_mcontact($post)
        {
            #  $contactos = array('nombre'=>$post['nombre'], 'correo'=>$post['correo'], 'cargo'=>$post['cargo']);
           
            $query = $this->db->insert('contacto',array('nombre'=>$post['nombre'], 
                                                        'correo'=>$post['correo'],
                                                        'cargo' =>$post['cargo']));
            # Recuperamos el id del contacto...
            $id    = $this->db->insert_id();

            # Aquí recuperamos el id cliente y del contacto y lo relacionamos en la bd.
            $data = array('idcliente'=> $post['idCliente'], 'idcontacto'=>$id);
            $this->db->insert('contacto_cliente', $data);

            # ¿Existe algún en el post la variable telefonos?
            if(array_key_exists('telefonos', $post)){

               $obj = new modelo_rit();      # Instanciamos un objeto del modelo relacion id´s con telefonos...
                                              # tabla                columna     idContacto    datos      
               $resp = $obj->relacionTelefonos('telefonos_contactos','idcontacto', $id, $post['telefonos']);
             
            } # Fin del post['telefonos']...

            return $query;   

        } # Fin del metodo insert_mcontact()...

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
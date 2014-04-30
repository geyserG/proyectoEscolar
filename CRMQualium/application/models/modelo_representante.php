 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'model_phone.php';
    class Modelo_representante extends CI_Model
    {          

        function set_tel()
        {
            $obj = new model_phone();
            return $obj;
        }

        function insert_r($post){
            
            $representante = array(
                                'nombre' => $post['nombre'],
                                'correo' => $post['correo'],
        						'cargo'	 => $post['cargo']
        					  );//Verificar si es un arreglo

            $query = $this->db->insert('representante',$representante);
            $id    = $this->db->insert_id();

            
            $data = array('idcliente'=> $post['idCliente'], 'idrepresentante'=>$id);
            $this->db->insert('representante_cliente', $data);


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
                        #$this->db->insert('telefonos_representante', array('idrepresentante'=> $id, 'idtelefono'=>$id_tel[$i]));
                        $var[$i] = array('idrepresentante'=> $id, 'idtelefono'=>$id_tel[$i]);
                    } 
                       $this->db->insert_batch('telefonos_representante', $var);             
                                   
                }else{
                    $this->db->insert('telefonos_representante', array('idrepresentante'=> $id, 'idtelefono'=>$id_tel));
                }
                 
             } # Fin del post telefonos          
                     
        } # Fin del insert_representante();

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
       function delete_representante($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
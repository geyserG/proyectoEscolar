 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'modelo_rit.php';
    class Modelo_representante extends CI_Model
    {          

        function insert_r($post)
        {
            #array('nombre'=>$post['nombre'], 'correo'=>$post['correo'], 'cargo'=>$post['cargo']
            
            $query = $this->db->insert('representante', array('nombre'=>$post['nombre'], 
                                                              'correo'=>$post['correo'], 
                                                              'cargo' =>$post['cargo']));
            $id    = $this->db->insert_id();
            
            $data = array('idcliente'=> $post['idCliente'], 'idrepresentante'=>$id);
            $this->db->insert('representante_cliente', $data);

            # ¿Existe algún en el post la variable telefonos?
            if(array_key_exists('telefonos', $post)){

               $obj = new modelo_rit();      # Instanciamos un objeto del modelo relacion id´s con telefonos...
               $resp = $obj->relacionTelefonos('telefonos_representante', 'idrepresentante', $id, $post['telefonos']);
             
            } # Fin del post['telefonos']...  

             return $query;        
                     
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
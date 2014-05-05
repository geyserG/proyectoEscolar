 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'modelo_rit.php';
    class Model_contact extends CI_Model
    {          
        function obj(){
            return $obj = new modelo_rit();
        }
        function insert_C($post)
        {
            $query = $this->db->insert('contacto',$post);
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

        function get_C($id){

            $obj = $this->obj(); $cont=0;
                     
            ($id===False) ? $query = $this->db->get('contacto') :
                            $query = $this->db->get_where('contacto', array('id'=>$id));

            foreach ($query->result() as $key => $value) {               
                $resp[$cont]['id'] = $value->id; 
                $resp[$cont]['idcliente'] = $value->idcliente;
                $resp[$cont]['nombre'] = $value->nombre;
                $resp[$cont]['email'] = $value->correo;
                $resp[$cont]['cargo'] = $value->cargo;                
                $resp[$cont]['telefonos'] = $obj->joinDinamico($value->id, 'idcontacto', 'idtelefono', 'telefonos', 'telefonos_contactos'); 
                $cont++;
            }
            return $resp;       	
        } # Fin de la función get_C

        function update_C(){
        	
          $contactos = array(
                                'nombre_completo' => $this->input->post('nombreContacto'),
                                'correo'          => $this->input->post('correoContacto'),
                                'cargo'           => $this->input->post('cargoContacto')
                              );//Verificar si es un arreglo

            $this->db->where('id', $id);
            $this->db->update('contacto', $contactos); 

        }
        private function delete_C($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
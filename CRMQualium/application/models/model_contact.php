 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    require_once 'modelo_rit.php';
    class Model_contact extends CI_Model
    {          
        function obj(){
            return $obj = new modelo_rit();
        }
        function insert_C($post)
        {

            $contacto = array(
                            'idcliente'=> $post['idCliente'],
                            'nombre'   => $post['nombre'],
                            'correo'   => $post['correo'],
                            'cargo'    => $post['cargo'],
                            );

            $query = $this->db->insert('contactos',$contacto);
            return $this->db->insert_id();

           //   # ¿Existe algún en el post la variable telefonos?
           //  if(array_key_exists('telefonos', $post)&&array_key_exists(0, $post['telefonos']))
           //  {
           //    for ($i=0; $i < count($post['telefonos']); $i++) 
           //    { 
                
           //      $phone[$i] = array('idpropietario'=>$id, 'tabla'=>'contactos', 'numero'=>$post['telefonos'][$i]->numero, 'tipo'=>$post['telefonos'][$i]->tipo);
           //    }
           //    $query = $this->db->insert_batch('telefonos', $phone);  
           //    return $query; 

           //  } # Fin del post['telefonos']...  
           // if(array_key_exists('telefonos', $post))
           //  {
           //    $phone =  array('idpropietario'=>$id, 'tabla'=>'contactos', 'numero'=>$post['telefonos']->numero, 'tipo'=>$post['telefonos']->tipo);
           //    $query = $this->db->insert('telefonos', $phone);
           //    return $query; 
           //  }

        } # Fin del metodo insert_mcontact()...

        function get_C($id){

            $obj = $this->obj(); $cont=0; $resp = False;
                     
            ($id===False) ? $query = $this->db->get('contactos') :
                            $query = $this->db->get_where('contactos', array('id'=>$id));

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
        	
            $this->db->where('id', $id);
            $this->db->update('contactos', $put); 

        }
        private function delete_C($id){

            $query = $this->db->delete('contactos', array('id' => $id));
            return $query;
            
        }

}
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
        function insert_C($contacto)
        {
            $query = $this->db->insert('contactos',$contacto);
            return $this->db->insert_id();

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
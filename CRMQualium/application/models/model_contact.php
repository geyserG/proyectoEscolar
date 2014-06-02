 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    require_once 'modelo_rit.php';
    class Model_contact extends CI_Model
    {          
        public function obj(){
            return $obj = new modelo_rit();
        }
        public function insert_C($contacto)
        {
            $query = $this->db->insert('contactos',$contacto);
            return $this->db->insert_id();
        } # Fin del metodo insert_mcontact()...

        public function get_C($id){

            $obj = $this->obj(); $cont=0; $resp = False;
                     
            ($id===False) ? $query = $this->db->get('contactos') :
                            $query = $this->db->get_where('contactos', array('id'=>$id));

            // foreach ($query->result() as $key => $value) {               
            //     $resp[$cont]['id'] = $value->id; 
            //     $resp[$cont]['idcliente'] = $value->idcliente;
            //     $resp[$cont]['nombre'] = $value->nombre;
            //     $resp[$cont]['correo'] = $value->correo;
            //     $resp[$cont]['cargo'] = $value->cargo;                
            //     $resp[$cont]['telefonos'] = $obj->joinDinamico($value->id, 'idcontacto', 'idtelefono', 'telefonos', 'telefonos_contactos'); 
            //     $cont++;
            // }
            return $resp;       	
        } # Fin de la función get_C

        public function patch_C($id, $put) {  
            (array_key_exists(0, $put)&&is_object($put[0])) ? $put = (array)$put[0] : $put = $put;
            $this->db->where('id', $id); return $this->db->update('contactos', $put); }

        public function update_C($id){  $this->db->where('id', $id); return $this->db->update('contactos', $put); }

        public function delete_C($id){  $del = array('id' => $id);   return $this->db->delete('contactos', $del); }

}
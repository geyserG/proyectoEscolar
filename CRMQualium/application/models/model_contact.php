 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    class Model_contact extends CI_Model
    {          
       public function insert_C($contacto)
        {
            $query = $this->db->insert('contactos',$contacto);
            return $this->db->insert_id();
        } # Fin del metod insert_mcontact()...

        public function get_C($id=FALSE)
        {                
              if($id!=FALSE)
              { 
                $query = $this->db->get_where('contactos', array('id'=>$id))->result();
                ($query) ? $query = $query[0] : $query = false;
                 return $query; 
              }
              $query = $this->db->get('contactos');
              return $query->result();   
        }

        public function patch_C($id, $put) {  
            (array_key_exists(0, $put)&&is_object($put[0])) ? $put = (array)$put[0] : $put = $put;
            $this->db->where('id', $id); return $this->db->update('contactos', $put); }

        public function update_C($id){  $this->db->where('id', $id); return $this->db->update('contactos', $put); }

        public function delete_C($id){  $del = array('id' => $id);   return $this->db->delete('contactos', $del); }

}
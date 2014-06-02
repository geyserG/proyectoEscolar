 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    require_once 'modelo_rit.php';
    class Modelo_representante extends CI_Model
    {          

      function obj(){  return $obj = new modelo_rit();  }

      function insert_r($representante)
      {
        $query = $this->db->insert('representante', $representante);
        return $this->db->insert_id();
      } # Fin del insert_representante();

      function get_r($id=FALSE)
      {               
          if($id!=FALSE)
          { 
            $query = $this->db->get_where('representante', array('id'=>$id))->result();
            ($query) ? $query = $query[0] : $query = false;
             return $query; 
          }
          $query = $this->db->get('representante');
          return $query->result();   
      }

      public function patch_representante($id, $put){ 
        (array_key_exists(0, $put)&&is_object($put[0])) ? $put = (array)$put[0] : $put = $put;
        $this->db->where('id', $id); return $this->db->update('representante', $put); }

      function update_representante($id, $put){

        $this->db->where('id', $id);
        $this->db->update('representante', $put); 

      }
      function delete_r($id){

        $query = $this->db->delete('representante', array('id' => $id));
       return $query;
            
      }

}
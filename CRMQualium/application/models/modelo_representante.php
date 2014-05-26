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

      function get_r($id)
      {
        $obj = $this->obj(); $cont=0;  $resp = False;                   
        ($id===False) ? $query = $this->db->get('representante') :
                        $query = $this->db->get_where('representante', array('id'=>$id));

        foreach ($query->result() as $key => $value) 
        {               
          $resp[$cont]['id'] = $value->id; 
          $resp[$cont]['idcliente'] = $value->idcliente;
          $resp[$cont]['nombre'] = $value->nombre;
          $resp[$cont]['correo'] = $value->correo;
          $resp[$cont]['cargo'] = $value->cargo;                
          // $phone = $this->db->get_where('telefonos',array('idpropietario'=>$id, 'tabla'=>'representante'));
          // $phone = $phone->result();
          // $resp[$cont]['telefonos'] = $phone;
          // $resp[$cont]['telefonos'] = $obj->joinDinamico($value->id, 'idrepresentante', 'idtelefono', 'telefonos', 'telefonos_representante'); 
          $cont++;
        }

          return $resp;        	
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
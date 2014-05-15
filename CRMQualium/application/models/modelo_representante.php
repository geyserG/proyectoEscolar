 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    require_once 'modelo_rit.php';
    class Modelo_representante extends CI_Model
    {          

      function obj(){  return $obj = new modelo_rit();  }

      function insert_r($post)
      {
        $representante = array(
                            'idcliente'=> $post['idCliente'],
                            'nombre'   => $post['nombre'],
                            'correo'   => $post['correo'],
                            'cargo'    => $post['cargo'],
                    );
        $query = $this->db->insert('representante',$representante);
        $id = $this->db->insert_id();

        # ¿Existe algún en el post la variable telefonos?
        if(array_key_exists('telefonos', $post)&&array_key_exists(0, $post['telefonos']))
        {
          for ($i=0; $i < count($post['telefonos']); $i++) 
          { 
            
            $phone[$i] = array('idpropietario'=>$id, 'tabla'=>'representante', 'numero'=>$post['telefonos'][$i]->numero, 'tipo'=>$post['telefonos'][$i]->tipo);
          }
          $query = $this->db->insert_batch('telefonos', $phone);   return $query;   

        } # Fin del post['telefonos']...  
       if(array_key_exists('telefonos', $post))
        {
          $phone =  array('idpropietario'=>$id, 'tabla'=>'representante', 'numero'=>$post['telefonos']->numero, 'tipo'=>$post['telefonos']->tipo);
          $query = $this->db->insert('telefonos', $phone);         return $query;   
        }               
                     
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
          $resp[$cont]['email'] = $value->correo;
          $resp[$cont]['cargo'] = $value->cargo;                
          // $phone = $this->db->get_where('telefonos',array('idpropietario'=>$id, 'tabla'=>'representante'));
          // $phone = $phone->result();
          // $resp[$cont]['telefonos'] = $phone;
          // $resp[$cont]['telefonos'] = $obj->joinDinamico($value->id, 'idrepresentante', 'idtelefono', 'telefonos', 'telefonos_representante'); 
          $cont++;
        }

          return $resp;        	
      }

      function update_representante($id, $put){

        $this->db->where('id', $id);
        $this->db->update('representante', $put); 

      }
      function delete_representante($id){

        $query = $this->db->delete('representante', array('id' => $id));
       return $query;
            
      }

}
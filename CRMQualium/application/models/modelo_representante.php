 <?php
    /**
    * Operaciones en la base de datos con los contactos
    */
    include 'modelo_rit.php';
    class Modelo_representante extends CI_Model
    {          

      function obj(){  return $obj = new modelo_rit();  }

      function insert_r($post)
      {
        $query = $this->db->insert('representante',$post);
        $id = $this->db->insert_id();
            
        $data = array('idcliente'=> $post['idCliente'], 'idrepresentante'=>$id);
        $this->db->insert('representante_cliente', $data);

        # ¿Existe algún en el post la variable telefonos?
        if(array_key_exists('telefonos', $post)){
          $obj = new modelo_rit();      # Instanciamos un objeto del modelo relacion id´s con telefonos...
          $resp = $obj->relacionTelefonos('telefonos_representante', 'idrepresentante', $id, $post['telefonos']);
           
        } # Fin del post['telefonos']...  

          return $query;        
                     
      } # Fin del insert_representante();

      function get_r($id)
      {
        $obj = $this->obj(); $cont=0;                     
        ($id===False) ? $query = $this->db->get('representante') :
                        $query = $this->db->get_where('representante', array('id'=>$id));

        foreach ($query->result() as $key => $value) 
        {               
          $resp[$cont]['id'] = $value->id; 
          $resp[$cont]['idcliente'] = $value->idcliente;
          $resp[$cont]['nombre'] = $value->nombre;
          $resp[$cont]['email'] = $value->correo;
          $resp[$cont]['cargo'] = $value->cargo;                
          $resp[$cont]['telefonos'] = $obj->joinDinamico($value->id, 'idrepresentante', 'idtelefono', 'telefonos', 'telefonos_representante'); 
          $cont++;
        }

          return $resp;        	
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
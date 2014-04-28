<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/

	class Model_phone extends CI_Model
	{
		
		function __construct()
		{
			
		}

		public function insert_p($post)
		{
			# Telefono a registrar
			$phone = array('numero'=>$post['numero'], 'tipo'=>$post['tipo']);
			# Esperamos un true de la consulta
			$query = $this->db->insert('telefonos', $phone);
			# insert_id() es una función del helper de CI para devolver el id de la nueva inserción						
			$id = $this->db->insert_id();
			($query) ? $var = $id : $var = $query;	
			return $var;	
		}

		public function get_p($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('telefonos') : $this->db->where('id', $id); $query = $this->db->get('telefonos');

			return $query->result();	
		}
		public function update_p($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('telefonos', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_p($id)
		{
			$query = $this->db->delete('telefonos', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
<?php
	/**
	* Operaciones en la tabla Servicios de la bd...
	*/
	class Modelo_usuarios extends CI_Model
	{
		
		function __construct()
		{
						
		}

		public function insert_user($post)
		{
			$query = $this->db->insert('usuarios', $post);
			return $query; 
		}

		public function get_user($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('usuarios') :
			$this->db->where('id', $id); $query = $this->db->get('usuarios');			
			
			return $query->result();			
		}

		public function update_user($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('usuarios', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_user($id)
		{
			$query = $this->db->delete('usuarios', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
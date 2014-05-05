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
			$query = $this->db->insert('personal_perfil', $post);
			return $query; 
		}

		public function get_user($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('personal_perfil') :
			$this->db->where('id', $id); $query = $this->db->get('personal_perfil');			
			
			return $query->result();			
		}

		public function update_user($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('personal_perfil', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_user($id)
		{
			$query = $this->db->delete('personal_perfil', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
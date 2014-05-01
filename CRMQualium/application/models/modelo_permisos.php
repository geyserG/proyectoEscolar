<?php
	/**
	* Operaciones en la tabla Servicios de la bd...
	*/
	class Modelo_permisos extends CI_Model
	{
		
		function __construct()
		{						
		}

		public function insert_perm($post)
		{
			$query = $this->db->insert('permisos', $post);
			return $query; 
		}

		public function get_perm($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('permisos') :
			$this->db->where('id', $id); $query = $this->db->get('permisos');			
			
			return $query->result();			
		}

		public function update_perm($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('permisos', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_perm($id)
		{
			$query = $this->db->delete('permisos', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
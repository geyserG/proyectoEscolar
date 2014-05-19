<?php
	
	class Modelo_roles extends CI_Model
	{
		
		function __construct(){	}

		public function insertRol($rol){ return $this->db->insert('rolesperfiles', $rol); } # Fin del metodo insertar Rol.

		public function getRol($id=FALSE)
		{
			($id===FALSE) ? $query = $this->db->get('rolesperfiles') :
						    $query = $this->db->get_where('rolesperfiles', array('id'=>$id));			
			return $query->result();				
		}

		public function patchRol($id, $put)
		{
			$this->db->where('id', $id);
			$query = $this->db->update('rolesperfiles', $put);
			return $query;
		}
		public function updateRol($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('rolesperfiles', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function deleteRol($id)
		{
			$query = $this->db->delete('rolesperfiles', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
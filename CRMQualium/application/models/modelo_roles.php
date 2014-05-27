<?php
	
	class Modelo_roles extends CI_Model
	{
		
		function __construct(){	}

		public function insertRol($rol){ 

			 $this->db->insert('roles', $rol);
			 $query = $this->db->insert_id();
			 return $this->getRol($query);
			 

		 } # Fin del metodo insertar Rol.

		public function getRol($id=FALSE)
		{
			if($id===NULL) {
				return $this->db->get('roles')->result();	
			}
			else
			{
				$this->db->where('id', $id); 
				$query = $this->db->get('roles')->result(); 
				return $query[0];
			}			
		}

		public function patchRol($id, $put)
		{
			$this->db->where('id', $id);
			$query = $this->db->update('roles', $put);
			return $query;
		}
		public function updateRol($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('roles', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function deleteRol($id)
		{
			$query = $this->db->delete('roles', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
<?php
	
	class Modelo_roles extends CI_Model
	{
		
		function __construct(){	}

		public function insertRol($rol)
		{ 	
		    $this->db->insert('roles', $rol);
			$query = $this->db->insert_id();
			return $this->getRol($query);			 

		 } # Fin del metodo insertar Rol.

		public function getRol($id=FALSE)
		{
			if($id===FALSE){  return $this->db->get('roles')->result();	}

			$query = $this->db->get_where('roles', array('id'=> $id))->result(); 
			return (array_key_exists(0, $query)) ? $query[0] : $query = false;						
		}

		public function patchRol($id, $put)
		{
			$this->db->where('id', $id);
			return $this->db->update('roles', $put);
			
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
			return $this->db->delete('roles', array('id' => $id));
			
		}

	} # Fin de la clase Model_phones
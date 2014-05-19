<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Modelo_proyectoRoles extends CI_Model
	{
		
		function __construct(){	}

		public function insertProyRol($proyRol){ return $query = $this->db->insert('proyectoroles', $proyRol);	}
		# Fin del metodo insertar telefono.

		public function getProyRol($id=FALSE)
		{
			($id===FALSE) ? $query = $this->db->get('proyectoroles') :
						    $query = $this->db->get_where('proyectoroles', array('idproyecto'=>$id));			
			return $query->result();
		}

		public function patchProyRol($id, $put)
		{
			(!$id) ? $query = $this->db->insert('proyectoroles',$put) : # Si no llega id entonces se hace un insert
			         $this->db->where('id', $id); 
			         $query = $this->db->update('proyectoroles', $put); # Si llega un id se actualiza ese dato
			return $query;			         
		}
		public function updateProyRol($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('proyectoroles', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function deleteProyRol($id)
		{
			$query = $this->db->delete('proyectoroles', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
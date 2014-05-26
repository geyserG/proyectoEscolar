<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Modelo_personal extends CI_Model
	{
		
		function __construct()
		{
			
		}

		public function insertPersonal($post)
		{
			$query = $this->db->insert('personal', $post);
			return $this->db->insert_id();

		}# Fin del metodo insertar telefono.

		public function getPersonal($id = False)
		{
			if($id===False) {
				return $this->db->get('personal')->result();	
			}
			else
			{
				$this->db->where('id', $id); 
				$query = $this->db->get('personal')->result(); 			
				return $query[0];
			}			
		}

		public function patchPersonal($id, $put)
		{
			// if(!$id)
			// {
			// 	$this->db->insert('personal',$put);
			// }
			$this->db->where('id', $id);
			$query = $this->db->update('personal', $put);
			return $query;
		}
		public function updatePersonal($id, $put)
		{

			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('personal', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function deletePersonal($id)
		{
			$query = $this->db->delete('personal', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
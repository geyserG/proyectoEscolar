<?php
	/**
	* Operaciones en la tabla Servicios de la bd...
	*/
	class Modelo_servicios extends CI_Model
	{
	
		
		function __construct()
		{
			
		}

		public function insert_s($post)
		{
			$query = $this->db->insert('servicios', $post);
			return $query; 
		}
		public function get_s($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('servicios') : 
			$this->db->where('id', $id); $query = $this->db->get('servicios');

			if($query){ return $query->result(); }else{ return false;}
		#return $query->result();			
		}
		public function update_s($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('servicios', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_s($id)
		{
			$query = $this->db->delete('servicios', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
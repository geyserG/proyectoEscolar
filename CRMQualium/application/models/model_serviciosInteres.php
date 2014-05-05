<?php
	/**
	* Operaciones en la tabla Servicios de la bd...
	*/
	class Model_serviciosInteres extends CI_Model
	{
	
		function __construct()
		{
			
		}

		public function insert_servInteres($post)
		{
			$query = $this->db->insert('servicios_interes', $post);
			return $query; 
		}
		public function get_servInteres($id)
		{
			($id===False) ? $query = $this->db->get('servicios_interes') :
                            $query = $this->db->get_where('servicios_interes', array('id'=>$id));
			return $query->result();			
		}
		public function update_servInteres($id, $put)
		{
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('servicios_interes', $put);
			# Regresa true o false dependiendo de la consulta.
			return $query;
		}
		public function delete_servInteres($id)
		{
			$query = $this->db->delete('servicios_interes', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
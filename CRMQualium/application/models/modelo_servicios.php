<?php
	/**
	* Operaciones en la tabla Servicios de la bd...
	*/
	require_once 'modelo_rit.php';
	class Modelo_servicios extends CI_Model
	{		
		function __construct()
		{
			
		}

		public function insert_s($post)
		{  
			$insert='';
			foreach ($post as $key => $value) 
			{
				if(!empty($value)){	$insert = 1; }
			}
			
			if($insert==1)
			{
				$this->db->insert('servicios', $post); 	$id = $this->db->insert_id();
				return $this->get_s($id);  
			}
			return false;			

		} # Fin del metodo insertar...

		public function get_s($id=FALSE)
		{
			if($id===FALSE) 
			{
			 	return $this->db->get('servicios')->result();
			}
			else
			{
				$query = $this->db->get_where('servicios', array('id'=>$id))->result();
				return $query[0];
			}
		}
		# Esta funcion le sirve a la interfaz de modulo cliente_nuevo y consulta_cliente...

		public function get_sNuevoCliente()
		{
			$this->db->select('id, nombre, concepto');
			$this->db->order_by('nombre', 'asc');
			$query = $this->db->get('servicios');
			if($query){ return $query->result(); }else{ return false;}
		
		}

		public function patch_s($id, $put)
		{
			(array_key_exists(0, $put)&&is_object($put[0])) ? $put = (array)$put[0] : $put = $put;	
			$this->db->where('id', $id);
			# la variable $put devuelve los campos especificando que datos se actualizaron.
			$query = $this->db->update('servicios', $put);
			# Regresa true o false dependiendo de la consulta.
			if($query){ return $put; }
			return false;
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
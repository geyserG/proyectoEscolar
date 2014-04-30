<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/

	class Model_phone extends CI_Model
	{
		
		function __construct()
		{
			
		}

		public function insert_p($post)
		{
			$phone = array('nombre'		=>$post['nombre'], 
						   'fecha'		=>$post['fecha'], 
						   'hora'		=>$post['hora'], 
						   'lugar'		=>$post['lugar'],
						   'comentario' =>$post['comentario']);

			$query = $this->db->insert('actividades', $phone);
			return $query; 
		}
		public function get_p($id)
		{
			$this->db->select('*');
			($id==NULL) ? $query = $this->db->get('actividades') : $this->db->where('id', $id); $query = $this->db->get('telefonos');

			return $query->result();	
		}
		public function update_p($put)
		{
			$phone = array('numero'=>$post['numero'], 'tipo'=>$post['tipo']);
			$query = $this->db->insert('actividades', $phone);
			return $query;
		}
		public function delete_p($id)
		{
			$query = $this->db->delete('actividades', array('id' => $id));
			return $query;
		}

	} # Fin de la clase Model_phones
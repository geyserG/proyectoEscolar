<?php
	/**
	* Operaciones en la tabla phones de la bd...
	*/
	class Model_service extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function insert_p($post)
		{
			$phone = array(''=>,);
			return $query; 
		}
		public function get_p()
		{
			return $query;	
		}
		public function update_p($put)
		{
			return $query;
		}
		public function delete_p($id)
		{
			return $query;
		}

	} # Fin de la clase Model_phones
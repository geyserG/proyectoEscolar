<?php
	/**
	* Operaciones en la base de datos con los clientes
	*/
	class Model_customer extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function insert_customer(){

		}

		public function get_customers_model()
		{
			$query = $this->db->get('clientes');
			return $query->result_array();
		}

		public function update_customer(){

		}

		public function delete_customer(){

		}



	}//Fin de la clase Model_Customer		
<?php
	include 'model_phone.php';
	class Modelo_rit extends CI_Model
	{
		
		public function __construct()
		{
			
		}

		# Crea un objeto de tipo telefono...
		public function relacionTelefonos($tabla, $columna, $idc, $post)
		{
		  # Instanciamos al modelo_phone	
			$tel = new model_phone();
		  # Envia la variable $post['telefono'] al modelo telefonos...
		    $id_tel = $tel->insert_p($post);
		  # ¿$id_tel es un array? 
		    if(is_array($id_tel))
		    {	             	
		     # ahora envía el id contacto y telefono para relacionar contacto y telefono...
		       for ($i=0; $i<count($id_tel); $i++) 
		       { 
		       	 $var[$i] = array($columna=> $idc, 'idtelefono'=>$id_tel[$i]);
		       }
		       $query = $this->db->insert_batch($tabla,$var);		                               
		    }
		    else
		    {
		       $query = $this->db->insert($tabla, array($columna=> $idc, 'idtelefono'=>$id_tel));
		    }
		        return $query;
	    } # Fin del metodo relacionTelefonos...

	} # Fin de la clase modez.php
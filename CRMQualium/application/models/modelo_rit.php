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
		  # Instanciamos al modelo_phone	 # Envia la variable $post['telefono'] al modelo telefonos...
			$tel = new model_phone();		 $id_tel = $tel->insert_p($post);
		    
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

	    function joinDinamico($id, $idp, $idx, $tabla1, $tabla2)
		{
			$cont=0; $array=array();			
			# Traer todos los campos.
			$this->db->select('*');	 $this->db->from($tabla1); $this->db->join($tabla2, $tabla2.'.'.$idx.' = '.$tabla1.'.id');
			$query = $this->db->get();	
			
			if($id==='noid'){  	return $query;	}
			else
			{ 
				foreach ($query->result() as $key => $value) 
				{					
					if($value->$idp==$id)
					{
						if($idx == 'idtelefono'){
						$array[$cont]= $value->idtelefono;
						$cont++;
						}
						else{	$array[$cont] = $value->nombre;	$cont++;	}					
					}				
				}
				return $array;	
			}			
		} # Fin de joinDinamico()...

		# Esta funcion establece la relacion cliente servicio...
		public function insert_sic($servicios, $idc, $tabla)
		{
			if(is_array($servicios))
			{
				for ($i=0; $i < count($servicios); $i++) { 
					$query = $this->db->insert($tabla,array('idcliente' => $idc, 'idservicio'=> $servicios[$i]));					
				} # Fin del for
			} # Fin del if
			else{
				$query = $this->db->insert($tabla, array('idcliente' => $idc, 'idservicio'=> $servicios));
			} # Fin del else
			
			return $query;
		}# Fin del metodo insertar servicios...

	} # Fin de la clase modez.php
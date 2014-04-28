<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_functions {

	
	function validar_Arreglos($argumento){
	 
	 	$datos = array(); 	$cont=0;

	 	if(is_array($argumento))
	 	{

		 	foreach ($argumento as $key => $value) 
		 	{		 		

		 		if(is_array($value))
		 		{

		 			foreach ($value as $key2 => $value2) 
		 			{ 
		 		      	$datos[$cont]= $value2; 
	 				    $cont++;
		 			}

		 		}//if
		 		else
		 		{
		 			
			 		$datos[$cont]=$value;
			 		$cont++;
		 		}
		 	}//FOREACH
		 	return $datos;
		}//PRIMER IF
		else{

			 return $argumento;
		}
		
	}


	//SI ES UN ARREGLO ASOCIATIVO LA DESCOMPONE EN UN ARRAY DE INDICES....
	function arraypost($dpost){

		//Se inicializan las variables contador y arreglo
		$cont=0; $array='';

		if(is_array($dpost)){ //¿$dpost, Es un arreglo?

				foreach ($dpost as $key => $value) {
			    
			          
					if(is_array($value)){ //¿$value, Es un arreglo?

							foreach ($value as $key2 => $value2) {
								$array[$cont]=$value2;
					           	$cont++;
							}
					}else{
						 $array[$cont]=$value;
			           	 $cont++;
					}
		       	}
		       	//Hace una operacion AND para saber si las dos posiciones tienen valor.
		       	if(count($array)==2){
			       	if($array[0]&&$array[1])
			       	{
			       		return $array;	
			       	}
			       	else
			       	{
			       		return False;
			       	}
		       }
       			
       	}else
       	{
    		return False;
    		//return $dpost;
    	}
	}//Fin de arraypost

	function pre_insert($id, $cliente, $atr)
	{
		$datos = (array)$cliente;
		$key = array_keys($datos);
		$val = array_values($datos);

		foreach ($atr->result() as $key => $value) {
			# code...
		}

	}

	
	

	//DEVUEVLVE ARREGLOS QUE TIENEN VALOR EN SUS UNICAS TRES POSICIONES.
	function prwe_insert($id, $cliente)
	{	
			$cont=0;

			if($cliente->nombreFiscal)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 1,
					    			  'dato' => $cliente->nombreFiscal
	                         		);
	            $cont++;
	        }
	    
	    	if($cliente->email)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 2,
					    			  'dato' => $cliente->email
	                         		);
	            $cont++;
	        }
	    
	    	if($cliente->rfc)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 3,
					    			  'dato' => $cliente->rfc
	                         		);
	            $cont++;
	        }
	    
	    	if($cliente->paginaWeb)
	        {
	            $data[$cont] = array(  'cliente_id' => $id,
					    			   'atributo_id' => 4,
					    			   'dato' => $cliente->paginaWeb
	                         		);
	            $cont++;
	        }
	    
	    	if($cliente->giro)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 5,
					    			  'dato' => $cliente->giro
	                         		);
	            $cont++;
	        }

	        if($cliente->comentarioCliente)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 6,
					    			  'dato' => $cliente->comentarioCliente
					    			);
	            $cont++;
	        }

	        if($cliente->direccion)
	        {
	            $data[$cont] = array( 'cliente_id' => $id,
					    			  'atributo_id' => 7,
					    			  'dato' => $cliente->direccion
					    			 );
	            $cont++;
	        }
        return $data;
	         
    }//FIN DEL METODO PRE_INSERT();

    function listaTel(){

	    if(is_array($nombre))
	    {
	        for ($k=0; $k < count($nombre) ; $k++) 
	        { 
	                        
	            $envia[$k] = array(
	                               'nombre'=>$nombre[$k],
	                               'contenido'=>$contenido[$k],
	                               'fecha'=>$fecha[$k],
	                               'categoria_id'=>$categoria[$k]
	                               );           
	        }       
	    }
	    else
	       {
	            $envia[0] = array('nombre'=>$nombre,
	                       'contenido'=>$contenido,
	                       'fecha'=>$fecha,
	                       'categoria_id'=>$categoria,
	                       );
	        }
    }
}
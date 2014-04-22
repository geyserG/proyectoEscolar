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

	

	//DEVUEVLVE ARREGLOS QUE TIENEN VALOR EN SUS UNICAS TRES POSICIONES.
	function pre_insert($cliente_id, $nF, $tC, $correo, $giro, $direccion, $rfc, $comentario, $representate, $pWeb)
	{	
			$cont=0;
			$valor = $nF[0]&&$nF[1];

			if(($nF[0]&&$nF[1])&&$cliente_id)
	        {
	            $data[$cont] = array(  'cliente_id' => $cliente_id,
					    				'atributo_id' => $nF[0],
					    				'dato' => $nF[1]
	                         );

	            $cont++;
	        }

	    
	    	if($tC[0]&&$tC[1])
	        {
	            $data[$cont] =  array(  'cliente_id' => $cliente_id,
					    			'atributo_id' => $tC[0],
					    			'dato' => $tC[1]
	                         );
	             $cont++;
	        }

	    
	    	if($correo[0]&&$correo[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $correo[0],
				    			  'dato' => $correo[1]
	                         ); 
	            $cont++;
	        }

	    
	    	if($giro[0]&&$giro[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $giro[0],
				    			  'dato' => $giro[1]
	                         );
	            $cont++;
	        }

	       	if($direccion[0]&&$direccion[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $direccion[0],
				    			  'dato' => $direccion[1]);
	            $cont++;
	        }

	    
	    	if($rfc[0]&&$rfc[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $rfc[0],
				    			  'dato' => $rfc[1]);
	            $cont++;
	        }

	    
	    	if($comentario[0]&&$comentario[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $comentario[0],
				    			  'dato' => $comentario[1]);
	            $cont++;
	        }

	    
	    	if($representate[0]&&$representate[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $representate[0],
				    			  'dato' => $representate[1]);
	            $cont++;
	        }

	      	if($pWeb[0]&&$pWeb[1])
	        {
	            $data[$cont] =  array('cliente_id' => $cliente_id,
				    			  'atributo_id' => $pWeb[0],
				    			  'dato' => $pWeb[1]);
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
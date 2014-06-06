<script type="text/javascript" src="<?=base_url() ?>js/jquery-ui-1.10.4.custom.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url().'css/cotizacion/jquery-ui-1.10.4.custom.css'?>">

<section class="contenedor_principal_modulos"> 
	<h3>Información Básica</h3>
	<hr>
		<div class="datos_cotizacion">
			<input id="cliente" 	  type="search" value="" class="form-control" placeholder="Buscar cliente"><span id="buscar" class="icon-search"></span>
			<input type="hidden" id="idcliente" value="">
			<input id="representante" type="text"   value="" class="form-control" placeholder="Representante" disabled="true">	
			<input type="hidden" id="idrepresentante" value="">
			<input id="fecha"   type="text"   class="form-control" placeholder="12/12/2014" disabled="true" >	
		</div>		
		<div class="datos_cotizacion">
			<textarea id="detalles" style="width: 400px; height: 132px;" class="form-control" rows="3" placeholder="Detalles"></textarea><br>				
		</div>
		<div class="desborde"></div>			
		<h3>Inversión & Tiempo</h3>
	<hr>		
	<div id="txt_aliniado" >
	    <table     id="tablaServicios" class="table table-striped">
	    	<thead id="cabecera_serv"><tr><th>Servicios</th></tr>	</thead>
			<tbody class="scrollContent">							</tbody>
		</table> <!-- Tabla de Servicios -->

		<table id="mostrarTabla" class="table table-striped">
			<thead style="background : #F9F9F9;">
				<tr>
					<th>Todos<input id="todos" type="checkbox" name="todos"></th> <th>Servicio </th> <th>Duración</th> <th>Cantidad</th>
					<th>P/Unitario					</th> <th>Descuento</th> <th>Importe </th> <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
				</tr>
			</thead>
			<tbody id="trServicio"> </tbody>		
			<tr class="info"> <td></td> <td colspan="5">Total</td> <td><p id="total">0.00</p></td><td></td></tr>			
			<tfoot>
			<tr>
			    <td><button id="delete_varios"  type="button" class="btn btn-danger">  Eliminar varios 								   </button><td>
				    <button id="vistaPrevia"    type="button" class="btn btn-primary"> <span class="icon-preview"></span> Vista previa </button></td>		
			</tr>
			</tfoot>
		</table>

		<div class="desborde"></div><br><br> 
			<button id="guardar"   type="button" class="btn btn-default"> Guardar  </button>		    
			<button id="cancelar"  type="button" class="btn btn-default"> Cancelar </button>				
		</div>		
		<!-- <table id="con"></table>	 -->
    </section>    
</div>

<script type = "text/plantilla" id="plantilla_Cotizacion">
</script>

<script type = "text/plantilla" id="PCservicios">
	<td>
		<span id="infoSC" class="icon-info"></span>

		<label for="<%- id %>"><%- nombre %></label>
		<ul class="ocultoI">		
			<li> Concepto    : &nbsp;&nbsp; <%- concepto    %>  </li>   
			<li> Precio      : &nbsp;&nbsp; <%- precio      %>  </li>    
			<li> +Iva        : &nbsp;&nbsp; <%- masiva      %>  </li>   
			<li> Realización : &nbsp;&nbsp; <%- realizacion %>  </li>
		</ul>
        <input type="checkbox" class="serviciosCotizar" id="<%- id %>">  	  
	</td>
</script>
<script type = "text/plantilla" id="serviciosAgregado">	

		<td><input type="checkbox" id="todos" name="todos"></td><td><%-nombre %></td>

		<td><input type="text" id="duracion"  value="<%-realizacion%>"   class="valor">   </td>
		<td><input type="text" id="cantidad"  value="1"				     class="valor">   </td>
		<td><input type="text" id="precio"    value="<%-precio     %>"   class="valor">   </td>
		<td><input type="text" id="descuento" value="0" 				 class="valor">   </td>		
		<td><input 			   id="importe" 							 class="importes" name="importes" >
		<form class="filas">
			  <input type="hidden"   				 name="id" 		  value="<%-id%>">
		      <input type="hidden"  id="hduracion"   name="duracion"  value="<%-realizacion%>">
		      <input type="hidden"  id="hcantidad"   name="cantidad"  value="1"> 
		      <input type="hidden"  id="hprecio"     name="precio" 	  value="<%-precio     %>" >
		      <input type="hidden"  id="hdescuento"  name="descuento" value="0">
		</form>
		</td>

		<td class="iconos-operaciones">			
			<span class="icon-circledelete btndelete"  data-toggle="tooltip" title="Eliminar" id="<%- id %>"></span>
		</td>	
</script>

<script type="text/javascript" src="<?=base_url().'js/funcionescrm.js'?>"></script>
<!-- Librerias -->
<script type="text/javascript" src="<?=base_url().'js/backbone/lib/underscore.js' ?>"></script>
<script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.js'   ?>"></script>


<script type="text/javascript">
	var app = app || {};
	app.coleccionDeServicios      	  = <?php echo json_encode($servicios)      	?>;
	app.coleccionDeClientes       	  = <?php echo json_encode($clientes)       	?>;
	app.coleccionDeRepresentantes 	  = <?php echo json_encode($representantes) 	?>;
</script>

<!-- MVC -->
<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicio.js'			      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloCotizacion.js'			      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicioCotizado.js'	      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'	      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionCotizaciones.js'      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServiciosCotizados.js'?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicio.js'				      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicioCotizacion.js'	      ?>"> </script>
<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaNuevaCotizacion.js'		      ?>"> </script>
<script type="text/javascript">	var app = app || {};													 	   </script>



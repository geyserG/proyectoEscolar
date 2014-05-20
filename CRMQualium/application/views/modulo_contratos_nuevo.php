	<script src="js/jquery-ui-1.10.4.custom.js"></script>	
	<h3>Nuevo Contrato</h3>
	<hr><br>
	<input class="form-control datepicker " type="text" id="fechaInicio" placeholder="Fecha"> 
	<input type="text" class="form-control" placeholder="Buscar cliente">
	<span id="buscar" class="icon-search"></span>
	<input type="text" class="form-control" placeholder="Cliente">
	<input type="text" class="form-control" placeholder="Representante">
	<br>
	<h3>Inversión & Tiempo</h3>
	<hr><br>
	<table id="cabecera_fija" class="table table-striped " >
		<thead>
			<tr>
				<th>&nbsp;&nbsp;</th>
				<th style="width:318px;">Servicio</th>				
				<th>P/Unitario</th>
				<th></th>
			</tr>
		</thead>
	</table>		
	<div id="servicios_contratos">
		<table  class="table table-striped" >
			<tbody>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input id="cuadro_busqueda" type="text" class="form-control" placeholder="Otro servicio"></td>					
					<td><input id="cuadro_busqueda1"type="text" class="form-control" placeholder="Precio"></td>
					<td class="icon-operaciones">
					 <span id="icono_mas" class="icon-uniF476"></span>
					</td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tarjeta de presentación frente</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Medallón</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tríptico</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>díptico</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Catálogo</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tarjeta de presentación frente y vuelta</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Anuncio sencillo</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Menú de restaurante</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Diseño de caja</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Branding Completo</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Logo Animado</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Video Branding</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Campaña</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Aplicaciones de campaña</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web sencilla </td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web complicada (Mas de 5 secciones)</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web con sistema interno</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>App sencilla</td>					
					<td>$12,000</td>
					<td></td>
				</tr>
			</tbody>
	   </table><br>
	</div><br>
	<div id="serv_obtenidos">   
	    <table class="table table-striped table-curved" >
			<thead>
				<tr class="color_cabecera">
					<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th colspan="4" ></th>
					<th colspan="2" class="txt">Plan por evento</th>
					<th colspan="4" class="txt">Plan por Iguala</th>				
				</tr>
			</thead>			
			<tbody>
				<tr>
					<td><b>Todos</b><input type="checkbox"></td>
					<td><b>Servicio</b></td>
					<td><b>Descuento</b></td>
					<td><b>Duración</b></td>
					<td class="linea"><b>Cantidad</b></td>
					<td><b>P/Unitario</b></td>
					<td class="linea"><b>Precio</b></td>
					<td><b>P/Unitario</b></td>
					<td><b>Precio</b></td>
					<td>
						<select>
							<option>1 mes</option>
	  						<option>2 meses</option>
	  						<option>3 meses</option>
	  						<option>4 meses</option>
	  						<option>5 meses</option>
	  						<option>6 meses</option>
	  						<option>1 año</option>
	  						<option selected disabled>Duración</option> 						
					    </select>
				    </td>
				    <td></td>					
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tarjeta de presentación frente</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td ><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>					
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Medallón</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>				
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tríptico</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>					
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>díptico</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>				
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Catálogo</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Aplicacion movil</td>
					<td><input class="descuento" type="text" >&nbsp;%</td>
					<td><input class="precio" type="text" placeholder=""></td>
					<td class="linea"><input class="precio" type="text" placeholder=""></td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td class="linea">$12,00</td>
					<td><input class="precio" type="text" placeholder="$"></td>
					<td>$12,000</td>
					<td></td>
					<td class="icon-eliminar">
			        	<div class="eliminar_cliente">
			    			<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
			           </div>
		           </td>		
				</tr>						
			</tbody>
	   </table>
	   <div id="precio_total">
		   <table class="table table-striped">
			    <tbody>
					<tr>
						<td><b>Total</b></td>
					</tr>
				</tbody>
	   	    </table>
	   	</div>
	</div>
	<div class="desborde"></div> 
	<button type="button" class="btn btn-default">Eliminar varios</button>	
	<br><br><br>
	<button type="button" class="btn btn-primary">Aceptar</button>
	<button type="button" class="btn btn-default"><span class="icon-preview"></span> Vista previa</button>
	<button type="button" class="btn btn-danger">Cancelar</button>                 
</div>
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
</script>
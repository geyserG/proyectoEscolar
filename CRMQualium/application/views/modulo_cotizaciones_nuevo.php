    <section class="contenedor_principal_modulos"> 
		<h3>Información Básica</h3>
		<hr>
		<div id="busquedayfecha">
		<input type="search" class="form-control" placeholder="Buscar cliente">
		<span id="buscar" class="icon-search"></span>
		<input type="text" class="form-control" placeholder="12/12/2014" disabled>	
		</div>		
		<div id="datos_cotizacion">
			<input type="text" class="form-control" placeholder="Cliente">
			<input type="text" class="form-control" placeholder="Representante">			
		</div>
		<div class="desborde"></div>
		<textarea style="width: 850px; height: 80px;" class="form-control" rows="3" placeholder="Detalles"></textarea><br>		
		<h3>Inversión & Tiempo</h3>
		<hr>		
		<div id="txt_aliniado" >
		    <table id="tbla_services" class="table table-striped">
		    	<thead id="cabecera_serv">
					<tr>						
						<th style="width:295px;">Servicios</th>							
					</tr>
				</thead>
				<tbody class="scrollContent">
					<tr>
						<td><a href="#">Tarjeta de presentación frente</a>
							<button type="button" class="btn btn-default"><span class="icon-uniF476"></span>
							</button>
							<div id="prueba">
								<ul>	
									<li>Concepto:&nbsp;<h7>Diseño Gráfivo</h7><li>
									<li>P/Unitario:&nbsp;<h7>$300</h7><li>
									<li>+IVA:&nbsp;<h7>$380</h7><li>
									<li>Realización:&nbsp;<h7>1 día</h7><li>
									<li>Detalles:&nbsp;<h7></h7><li>
							    </ul>
						    </div>
						</td>
					</tr>
					<tr>
						<td>Medallón</td>
					</tr>
					<tr>
						<td>Tríptico</td>
					</tr>
					<tr>
						<td>díptico</td>
					</tr>
					<tr>
						<td>Catálogo</td>
					</tr>
					<tr>
						<td>Tarjeta de presentación frente y vuelta</td>
					</tr>
					<tr>
						<td>Anuncio sencillo</td>
					</tr>
					<tr>
						<td>Menú de restaurante</td>
					</tr>
					<tr>
						<td>Diseño de caja</td>
					</tr>
					<tr>
						<td>Branding Completo</td>
					</tr>
					<tr>
						<td>Logo Animado</td>
					</tr>
					<tr>
						<td>Video Branding</td>
					</tr>
					<tr>
						<td>Campaña</td>
					</tr>
					<tr>
						<td>Aplicaciones de campaña</td>
					</tr>
					<tr>
						<td>Página Web sencilla </td>
					</tr>
					<tr>
						<td>Página Web complicada (Mas de 5 secciones)</td>
					</tr>
					<tr>
						<td>Página Web con sistema interno</td>
					</tr>
					<tr>
						<td>App sencilla</td>
					</tr>
				</tbody>
		   </table>
		   <table id="mostrar_tbla" class="table table-striped">
			<tr style="height:20px;">
				<th>Todos<input type="checkbox"></th>
				<th>Servicio</th>
				<th>Duración</th>
				<th>Cantidad</th>
				<th>P/Unitario</th>
				<th>Descuento</th>
				<th>Precio</th>
				<th></th>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>Página web sencilla</td>
				<td>5</td>
				<td>1</td>
				<td>$12,000</td>
				<td>0%</td>
				<td>$12,000</td>
				<td class="iconos-operaciones">
					<span class="icon-trash"  data-toggle="tooltip" title="Eliminar"></span><span class="icon-uniF756" data-toggle="tooltip" title="Editar"></span>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>App sencilla</td>
				<td>5</td>
				<td>1</td>
				<td>$12,000</td>
				<td>0%</td>
				<td>$12,000</td>
				<td class="iconos-operaciones">
					<span class="icon-trash"  data-toggle="tooltip" title="Eliminar"></span><span class="icon-uniF756" data-toggle="tooltip" title="Editar"></span>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>Página web complicada</td>
				<td><input type="text" value="5"></td>
				<td><input type="text" value="1"></td>
				<td><input type="text" value="$12,000"></td>
				<td><input type="text" value="0%"></td>
				<td>$12,000</td>
				<td class="iconos-operaciones">
					<span class="icon-trash"  data-toggle="tooltip" title="Eliminar"></span><span class="icon-uniF756" data-toggle="tooltip" title="Editar"></span>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>Página web complicada</td>
				<td><input type="text" value="5"></td>
				<td><input type="text" value="1"></td>
				<td><input type="text" value="$12,000"></td>
				<td><input type="text" value="0%"></td>
				<td>$12,000</td>
				<td class="iconos-operaciones">
					<span class="icon-trash"  data-toggle="tooltip" title="Eliminar"></span><span class="icon-uniF756" data-toggle="tooltip" title="Editar"></span>
				</td>
			</tr>
			<tr class="info">
				<td></td>
				<td colspan="5">Total</td>
				<td>$122,323</td>
				<td></td>
			</tr>
		</table>
		<div class="desborde"></div><br><br> 
		<button id="delete_varios" type="button" class="btn btn-danger">Eliminar varios</button><br><br>		
		<button  type="button" class="btn btn-default">Guardar</button>
	    <button type="button" class="btn btn-primary"><span class="icon-preview"></span> Vista previa</button>
		<button type="button" class="btn btn-default">Cancelar</button>				
		</div>					
    </section>    
</div>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#prueba").slideToggle();
  });
});
</script>
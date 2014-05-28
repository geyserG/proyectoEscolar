	<script src="js/jquery-ui-1.10.4.custom.js"></script>

	<script>
		$(document).on('ready',function () {
		    $( ".datepicker" ).datepicker({
		      changeMonth: true,
		      changeYear: true
		    });
	    });
	</script>
	<h3>Nuevo Proyecto</h3>
	<hr><br>
	<div class="row">
		<div class="col-md-6">
			<div id="nom_proy">
				<select id="select_clientes" class="form-control">
				</select>
				<input type="text" class="form-control" placeholder="Nombre del proyecto">	
			</div>
		</div>
		<div class="col-md-6">
			<div id="fechas_proy">
				<h5><b>Especifique la fecha de inicio y entrega del proyecto</b></h5>
				<div id="divfech">	    	
				    <h5><b>Inicio</b></h5>	    
				    <input class="form-control datepicker" type="text" id="fechaInicio">	    
				</div>
				<div class="divfech1">
					<h5><b>Entrega</b></h5>
					<input class="form-control datepicker" type="text" id="fechaEntrega">	
			    </div>
				<div class="divfech1">
					<h5><b>Duración</b></h5>
					<span class="badge pull-center" id="duracion">6 Meses</span>	
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-3">
			<table class="table table-striped tbla_services2">
				<thead class="cabecera_serv2">
					<tr>						
					  <th>Servicios</th>
					</tr>
				</thead>
				<tbody id="tbody_servicios" class="scrolltbla">
				</tbody>
			</table>	
		</div>
		<div class="col-md-6">
			<table id="tbla_roles" class="table table-striped table-curved">
				<thead>
					<tr id="color_th">
						<th>&nbsp;&nbsp;&nbsp;</th>
						<th>Servicio seleccionado</th>
						<th>&nbsp;&nbsp;&nbsp;</th>
					</tr>
			    </thead>
			    <tbody id="tbody_servicios_seleccionados">
			    	<!-- PLANTILLA SERVICIOS SELECCIONADOS -->
			    </tbody>
			    <tfoot>
			    	<tr>
				    	<td colspan="3">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default btn-xs">
									<input type="checkbox"> Marcar todos
								</label>
							</div>
							<button type="button" class="btn btn-danger btn-xs">Eliminar marcados</button>
				    	</td>
				    </tr>
			    </tfoot>		
			</table>
		</div>
	</div> <!-- Fin class row -->

	<br>
	<div class="form-group">
	    <label for="exampleInputFile">Adjuntar archivo</label>
	    <input type="file" id="exampleInputFile">
	</div><br>
	<textarea class="form-control" rows="4" placeholder="Descripción"></textarea>
	
	<h3>Asignar Roles</h3>
	<hr><br>
	<div class="row">
		<div class="col-md-3">
			<table class="table table-striped tbla_services2">
				<thead class="cabecera_serv2">
					<tr>						
					  <th>Empleado</th>
					</tr>
				</thead>
				<tbody id="tbody_empleados" class="scrolltbla">
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<table id="tbla_roles" class="table table-striped table-curved">
				<thead>
					<tr id="color_th">
						<th>&nbsp;&nbsp;&nbsp;</th>
						<th>Empleados</th>
						<th>Roles</th>
						<th></th>
					</tr>
			    </thead>
			    <tbody id="tbody_empleados_seleccionados">
			    	<!-- PLANTILLA EMPLEADOS SELECCIONADOS -->
			    </tbody>
			    <tfoot>
			    	<tr>
				    	<td colspan="3">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default btn-xs">
									<input type="checkbox"> Marcar todos
								</label>
							</div>
							<button type="button" class="btn btn-danger btn-xs">Eliminar marcados</button>
				    	</td>
				    </tr>
			    </tfoot>
			</table>
		</div>
	</div> <!-- Fin class row -->

	
	<div class="desborde"></div><br><br>		
	<button type="button" class="btn btn-primary">Aceptar</button>&nbsp;
	<button type="button" class="btn btn-danger">Cancelar</button>

		
</div> <!-- LA APERTURA DE ESTA ETIQUETA ESTÁ EN OTRO DOCUMENTO. NO BORRAR!! -->



<!-- plantillas -->
	<script type="text/template" id="option_cliente">
		<option value="<%- id %>" name="idcliente">  <%- nombreComercial %> </option>
	</script>

	<script type="text/template" id="tds_servicio">
		<td>
			<label class="label_servicio" for="<%- id %>"><%- nombre %></label>
			<div class="check_posicion">
	        	<input type="checkbox" id="<%- id %>" class="checkbox_servicio">
	        <div>
		</td>
	</script>

	<script type="text/template" id="tds_servicio_seleccionado">
		<tr>
    		<td><input type="checkbox"></td>
		    <td><%- nombre %></td>
		    <td class="icon-eliminar">
		    	<label id="<%- id %>" class="icon-circledelete eliminarDeTabla" data-toggle="tooltip" data-placement="top" title="Eliminar"></label>
		    </td>
        </tr>
	</script>

	<script type="text/template" id="tds_empleado">
		<td>
			<label class="label_empleado" for="<%- id %>"><%- nombre %></label>
			<div class="">
	        	<input type="checkbox" id="<%- id %>" class="checkbox_empleado">
	        <div>
		</td>
	</script>

	<script type="text/template" id="tds_empleado_seleccionado">
		<tr>
    		<td><input type="checkbox"></td>
		    <td><%- nombre %></td>
		    <td>
		    	<div class="input-group">
					<span class="input-group-btn">
						<select class="select_rol">
				  	   		<!-- PLANTILLA DE ROL -->
						</select>
						<!-- <button class="btn btn-default" type="button">Go!</button> -->
					</span>
					<input type="text" class="form-control">
		    	</div>
		    </td>
		    <td class="icon-eliminar">
		    	<label id="<%- id %>" class="icon-circledelete eliminarDeTabla" data-toggle="tooltip" data-placement="top" title="Eliminar"></label>
		    </td>
        </tr>
	</script>

	<script type="text/template" id="option_rol">
		<%- nombre %>
	</script>


<script type="text/javascript">
	var app = app || {};
	app.coleccionDeClientes  = <?php echo json_encode($clientes)?>;
	app.coleccionDeServicios = <?php echo json_encode($servicios)?>;
	app.coleccionDeEmpleados = <?php echo json_encode($empleados)?>;
	app.coleccionDeRoles 	 = <?php echo json_encode($roles)?>;
</script>

<!-- Librerias Backbone -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/underscore.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.js'?>"></script>

<!-- MV* -->
	<!-- modelos -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloRol.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicio.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloEmpleado.js'?>"></script>
	<!-- colecciones -->
		<!--<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionClientes.js'?>"></script>-->
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionRoles.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionEmpleados.js'?>"></script>
	<!-- vistas -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaRol.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaEmpleado.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicio.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaNuevoProyecto.js'?>"></script>
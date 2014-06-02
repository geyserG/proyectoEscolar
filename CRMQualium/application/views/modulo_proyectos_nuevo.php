	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"> -->
	<!-- // <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
	<link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.min.css">
	<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
	<script>
	  // $(function() {
	  //   $( ".datepicker" ).datepicker({
	  //     changeMonth: true,
	  //     changeYear: true
	  //   });
	  // });
	</script>

	<div class="alert alert-warning oculto" id="advertencia">
		<button type="button" class="close cerrar">×</button>
		<h4>¡Advertencia!</h4>
		<p id="comentario"></p>
		<br>
		<button type="button" id="eliminar" class="btn btn-danger">Eliminar</button>
		<button type="button" id="cancelar" class="btn btn-default">Cancelar</button>
	</div>
	<div class="alert alert-danger alert-dismissable oculto" id="error">
		<button type="button" class="close cerrar">&times;</button>
		<strong>¡Error!</strong>
		<div id="comentario"></div>
	</div>
	<div class="alert alert-success alert-dismissable oculto" id="exito">
		<button type="button" class="close cerrar">&times;</button>
		<strong>¡Exito!</strong>
		<div id="comentario"></div>
	</div>

	<style type="text/css">
		#busquedaClinte {
			position: relative;
			z-index: 1;
		}
		.ocu {
			margin-top: -16px;
			z-index: 2;
			position: absolute;
			display: none;
		}
		.vis {
			margin-top: -16px;
			z-index: 2;
			position: absolute;
			display: inherit;
		}
		#busqueda {
			/*opacity: 1;*/
			/*position: absolute;*/
			/*top: -15px;*/
			width: 100%;
		}
	</style>

	<h3>Nuevo Proyecto</h3>
	<hr><br>
	<form id="formNuevoProyecto">
		<div class="row">
			<div class="col-md-3">
				<div id="nom_proy">
					<div id="busquedaClinte">
						<div class="form-group has-feedback">
						  <input type="text" id="busqueda" class="form-control" placeholder="Buscar cliente">
						  <span class="glyphicon glyphicon-search form-control-feedback" style="top:0px"></span>
						</div>
						
						<input type="hidden" id="hidden_cliente_id" name="cliente_id">
						<select id="select_clientes" class="form-control ocu" style="width:100%" name="idcliente">
						</select>
					</div>
					<input type="text" class="form-control" placeholder="Nombre del proyecto" style="width:100%" name="nombre">
				</div>
			</div>
			<div class="col-md-6">
				<fieldset>
					<label for="disabledTextInput">Especifique la fecha de inicio y entrega del proyecto</label>
					<div class="row">
						<div class="col-md-4">
							<div class="divfech">	    	
							    <h5><b>Inicio</b></h5>	    
							    <input id="fechaInicio" class="form-control" type="date" name="f_inicio">
							</div>
						</div>
						<div class="col-md-4">
							<div class="divfech">
								<h5><b>Entrega</b></h5>
								<input id="fechaEntrega" class="form-control" type="date" name="f_final">
						    </div>
						</div>
						<div class="col-md-3">
							<div class="divfech">
								<h5><b>Duración en días</b></h5>
								<input type="number" id="duracion" class="form-control">
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-3">
				<table class="table table-curved"><!--  tbla_apilacion -->
					<thead class="cabecera_serv2">
						<tr class="color_th">						
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
						<tr class="color_th">
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
					    	<td colspan="4">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default btn-xs">
										<input type="checkbox" id="checkboxServicios" class="btn_marcarTodos"> Marcar todos
									</label>
								</div>
								<button type="button" class="btn btn-danger btn-xs checkboxServicios btn_eliminarMarcados">Eliminar marcados</button>
					    	</td>
					    </tr>
				    </tfoot>		
				</table>
			</div>
		</div> <!-- Fin class row -->

		<br>
		<div class="form-group">
		    <label for="exampleInputFile">Adjuntar archivo</label>
		    <input type="file" id="exampleInputFile" name="archivo">
		</div><br>
		<textarea class="form-control" rows="4" placeholder="Descripción" name="descripcion"></textarea>
		
		<h3>Asignar Roles</h3>
		<hr><br>
		<div class="row">
			<div class="col-md-3">
				<table class="table table-curved"><!--  tbla_apilacion -->
					<thead class="cabecera_serv2">
						<tr class="color_th">						
						  <th>Empleado</th>
						</tr>
					</thead>
					<tbody id="tbody_empleados" class="scrolltbla">
					</tbody>
				</table>
			</div>
			<div class="col-md-7">
				<table id="tbla_roles" class="table table-striped table-curved">
					<thead>
						<tr class="color_th">
							<th>&nbsp;&nbsp;&nbsp;</th>
							<th style="width: 200px;">Empleados</th>
							<th style="width: 400px;">Roles (<small>Establesca un responsable para el nuevo proyecto</small>)</th>
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
										<input type="checkbox" id="checkboxEmpleados" class="btn_marcarTodos"> Marcar todos
									</label>
								</div>
								<button type="button" class="btn btn-danger btn-xs checkboxEmpleados btn_eliminarMarcados">Eliminar marcados</button>
					    	</td>
					    </tr>
				    </tfoot>
				</table>
			</div>
		</div> <!-- Fin class row -->
		<button type="button" class="btn btn-default">Cancelar</button>
		<button type="button" id="btn_nuevoProyecto" class="btn btn-primary">Guardar</button>
	</form>
</div> <!-- LA APERTURA DE ESTA ETIQUETA ESTÁ EN OTRO DOCUMENTO. NO BORRAR!! -->



<!-- plantillas -->
	<script type="text/template" id="option_cliente">
		<%- nombreComercial %>
	</script>

	<script type="text/template" id="tds_servicio">
		<td style="padding:0px">
			<label class="label_servicio" for="servicio_<%- id %>"><%- nombre %></label>
			<div class="check_posicion"><!---->
	        	<input type="checkbox" id="servicio_<%- id %>" class="checkbox_servicio">
	        <div>
		</td>
	</script>

	<script type="text/template" id="tds_servicio_seleccionado">
		<tr>
    		<td>
    			<input type="checkbox" class="checkbox_servicios" name="checkboxServicios"></td>
		    <td>
		    	<%- nombre %>
		    	<input type="hidden" name="servicios" value="<%- id %>">
		    </td>
		    <td class="icon-eliminar">
		    	<label id="servicio_<%- id %>" class="icon-circledelete eliminarDeTabla_servicios" title="Eliminar"></label>
		    </td>
        </tr>
	</script>

	<script type="text/template" id="tds_empleado">
		<td style="padding:0px">
			<label class="label_empleado" for="empleado_<%- id %>"><%- nombre %></label>
			<div class="check_posicion"><!---->
	        	<input type="checkbox" id="empleado_<%- id %>" class="checkbox_empleado">
	        <div>
		</td>
	</script>

	<script type="text/template" id="tds_empleado_seleccionado">
		<td>
			<input type="checkbox" class="checkbox_empleados" name="checkboxEmpleados">
		</td>
	    <td>
	    	<%- nombre %>
	    </td>
	    <td class="td_roles">
		    	<div>
		    		<div class="row">
						<div class="col-md-6">
							<select class="form-control input-sm select_rol" style="width:auto;margin:0;">
					  	   		<!-- PLANTILLA DE ROL -->
							</select>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-sm" style="width:auto;">
								<input type="text" id="" class="form-control text_nuevoRol" placeholder="Nuevo Rol">
								<span class="input-group-btn">
									<button type="button" id="" class="btn btn-default btn_nuevoRol">Agregar</button>
								</span>
							</div>
						</div>
					</div>
				</div>
	    		<form class="form_participante">
	    			<input type="hidden" name="personal_id" value="<%- id %>">
				</form>
	    </td>
	    <td class="icon-eliminar">
	    	<label id="empleado_<%- id %>" class="icon-circledelete eliminarDeTabla_empleados" data-toggle="tooltip" data-placement="top" title="Eliminar"></label>
	    </td>
	</script>

	<script type="text/template" id="option_rol">
		<%- nombre %>
	</script>

	<script type="text/template" id="input_rol">
		<div class="tag_rol">
			<div class="btn-group btn-group-xs">
				<button class="btn btn-default btn_eliminarRol" value="<%- id %>">
					<span class="icon-circledelete"></span>
				</button>
				<button type="button" class="btn btn-default" disabled="disabled">
					<%- nombre %>
				</button>
			</div>
			<input type="hidden" class="rol" name="<%- name %>" value="<%- id %>">
		</div>
	</script>

<script type="text/javascript" src="<?=base_url().'js/backbone/app.js'?>"></script>
<script type="text/javascript">
	var app = app || {};
	app.coleccionDeClientes  = <?php echo json_encode($clientes)?>;
	app.coleccionDeServicios = <?php echo json_encode($servicios)?>;
	app.coleccionDeEmpleados = <?php echo json_encode($empleados)?>;
	app.coleccionDeRoles 	 = <?php echo json_encode($roles)?>;
</script>

<!-- otras recursos -->
	<script type="text/javascript" src="<?=base_url().'js/funcionescrm.js'?>"></script>

<!-- Librerias Backbone -->
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/underscore.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'js/backbone/lib/backbone.localStorage.js'?>"></script>

<!-- MV* -->
	<!-- modelos -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloCliente.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloServicio.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloRol.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloProyecto.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloEmpleado.js'?>"></script>
	<!-- colecciones -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionClientes.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionRoles.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionProyectos.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionEmpleados.js'?>"></script>
	<!-- vistas -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaRol.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaEmpleado.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicio.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaNuevoProyecto.js'?>"></script>
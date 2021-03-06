	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"> -->
	<!-- // <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
	<link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.min.css">
	<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>

	<div class="alert alert-warning oculto" id="advertencia">
		<button type="button" class="close cerrar">×</button>
		<h4>¡Advertencia!</h4>
		<p id="comentario"></p>
		<br>
		<button type="button" id="cancelar" class="btn btn-danger">Cancelar archivos</button>
		<button type="button" id="continuar" class="btn btn-default">Continuar</button>
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

	<h1>Nuevo Proyecto</h1>

	<style type="text/css">
		.section_Visible {
			display: block;
			/*border: 1px solid gray;*/
		}

		.section_Oculto {
			display: none;
			/*border: 1px solid gray;*/
		}

		.fileinput-button {
			position: relative;
			overflow: hidden;
		}
		.fileinput-button input {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			opacity: 0;
			-ms-filter: 'alpha(opacity=0)';
			font-size: 200px;
			direction: ltr;
			cursor: pointer;
		}

		/* Fixes for IE < 8 */
		@media screen\9 {
			.fileinput-button input {
				filter: alpha(opacity=0);
				font-size: 100%;
				height: 100%;
			}
		}

		#divSecciones {
			position: relative;
		}
		#divSecciones section {
			box-sizing: border-box;
			width: 100%;
			position: absolute;
		}
		#divSecciones section:not(:first-of-type) {
			display: none;
		}
		#progressbar {
			margin-bottom: 30px;
			overflow: hidden;
			counter-reset: step;
		}
		#progressbar li {
			list-style-type: none;
			text-transform: uppercase;
			text-align: center;
			font-size: 9px;
			width: 33.33%;
			float: left;
			position: relative;
		}
		#progressbar li:before {
			content: counter(step);
			counter-increment: step;
			line-height: 20px;
			display: block;
			font-size: 10px;
			color: #333;
			background: white;
			margin: 0 auto 5px auto;
		}
		#progressbar li:first-child:after {
			content: none; 
		}
		#progressbar li.active:before,  #progressbar li.active:after{
			background: #27AE60;
			color: white;
		}
	</style>
	<div id="divSecciones">
		<ul id="progressbar">
			<li class="active">Datos de proyecto</li>
			<li>Roles del proyecto</li>
			<li>Archivos del proyecto</li>
		</ul>
		<section id="paso1" class="section_Visible"><!-- section_Oculto -->
			<div class="panel panel-primary">
				<div class="panel-heading">Datos de proyecto</div>
				<div class="panel-body">
					<form id="formNuevoProyecto">
						<div class="row">
							<div class="col-md-3">
								<div id="nom_proy">
									<!-- <div id="busquedaClinte"> -->
										<div class="form-group has-feedback">
										  <input type="text" id="busqueda" class="form-control" placeholder="Buscar cliente" style="width: 100%;">
										  <span class="glyphicon glyphicon-search form-control-feedback" style="top:0px"></span>
										</div>
										
										<input type="hidden" id="hidden_idCliente" name="idcliente">
										<!-- <select id="select_clientes" class="form-control ocu" style="width:100%" name="idcliente">
										</select> -->
									<!-- </div> -->
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
											    <input id="fechaInicio" class="form-control" type="date" name="fechainicio">
											</div>
										</div>
										<div class="col-md-4">
											<div class="divfech">
												<h5><b>Termino</b></h5>
												<input id="fechaEntrega" class="form-control" type="date" name="fechafinal">
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
									    		<!-- <button type="button" id="checkboxServicios" class="btn_marcarTodos">Marcar todos</button> -->
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
						
						<textarea class="form-control" rows="4" placeholder="Descripción del proyecto" name="descripcion"></textarea>
					</form>
				</div>
				<div class="panel-footer">
					<button type="button" id="btn_cancelarProyecto" class="btn btn-default">Cancelar</button>
					<button type="button" id="btn_guardarProyecto" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</section>

		<section id="paso2" class="section_Visible">
			<div class="panel panel-primary">
				<div class="panel-heading">Roles del proyecto</div>
				<div class="panel-body">
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
								    	<td colspan="4">
								    		<!-- <button id="checkboxEmpleados" class="btn_marcarTodos"></button> -->
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
				</div>
				<div class="panel-footer">
					<button type="button" id="btn_cancelarRoles" class="btn btn-default">Cancelar</button>
					<button type="button" id="btn_guardarRoles" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</section>

		<section id="paso3" class="section_Visible">
			<div class="panel panel-primary">
				<div class="panel-heading">Archivos del proyecto</div>
				<div class="panel-body">
					<form id="form_subirArchivos">
						<label class="btn btn-success fileinput-button">
		                    <span class="icon-paperclip"></span>
		                    <span>Adjuntar archivos</span>
		                    <input type="file" id="inputArchivos" multiple name="archivo[]">
		                </label>
		                <button type="submit" id="btn_subirArchivo" class="btn btn-primary start">
		                    <i class="glyphicon glyphicon-upload"></i>
		                    <span>Subir</span>
		                </button>
		                <button type="reset" id="btn_cancelarArchivo" class="btn btn-warning cancel">
		                    <i class="glyphicon glyphicon-ban-circle"></i>
		                    <span>Cancelar</span>
		                </button>
				    </form>
				    <br>
					<table class="table table-hover"><!-- style="display: table-cell; width: 400px;" -->
						<thead>
							<tr>
								<th>Archivos a subir</th>
								<th>Tipo</th>
								<th>Tanaño</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="tbody_archivos">
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<button type="button" class="btn btn-default">Finalizar</button>
				</div>
			</div>
		</section>
	</div>
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
	    			<input type="hidden" name="idproyecto" value="<%- idproyecto %>">
	    			<input type="hidden" name="idpersonal" value="<%- id %>">
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

	<script type="text/template" id="tr_archivo">
		<tr class="<%- i %>">
			<td><%- nombre %></td>
			<td><%- tipo %></td>
			<td><%- tamaño %></td>
			<td class="icon-eliminar">
		    	<label id="<%- i %>" class="icon-circledelete eliminarArchivo"></label>
		    </td>
		</tr>
	</script>
<script type="text/javascript">
	var app = app || {};
	app.coleccionDeClientes  = <?php echo json_encode($clientes)?>;
	app.coleccionDeServicios = <?php echo json_encode($servicios)?>;
	app.coleccionDeEmpleados = <?php echo json_encode($empleados)?>;
	app.coleccionDeRoles 	 = <?php echo json_encode($roles)?>;
</script>

<!-- plugin jquery -->
	<script type="text/javascript" src="js/plugin/jquery.easing.min.js"></script>
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
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloRolProyecto.js'?>"></script>
	<!-- colecciones -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionClientes.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionRoles.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionProyectos.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionEmpleados.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionRolesProyectos.js'?>"></script>
	<!-- vistas -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaRol.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaEmpleado.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaServicio.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaNuevoProyecto.js'?>"></script>
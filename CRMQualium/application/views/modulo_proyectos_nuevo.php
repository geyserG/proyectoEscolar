	<script src="js/jquery-ui-1.10.4.custom.js"></script>
	<h3>Nuevo Proyecto</h3>
	<hr><br>
	<div id="nom_proy">
		<select id="select_clientes" class="form-control">
		</select>
		<!-- <input type="text" class="form-control" placeholder="Buscar Cliente">
		<span id="buscar" class="icon-search"></span> -->
		<!-- <input type="text" class="form-control" placeholder="Cliente"> -->
		<input type="text" class="form-control" placeholder="Nombre del proyecto">	
	</div>
	<div class="desborde"></div><br>
	<div id="fechas_proy">
		<h5><b>Especifique la fecha de inicio y entrega del proyecto</b></h5><br>
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
	<div class="desborde"></div><br>

	<!-- {{{{{{{{{{{{{{{{{{{{{{{{tabla de servicios}}}}}}}}}}}}}}}}}}}}}}}} -->
	<table class="table table-striped tbla_services2">
		<thead class="cabecera_serv2">
			<tr>						
			  <th>Servicios</th>
			</tr>
		</thead>
		<tbody id="tbody_servicios" class="scrolltbla">
		</tbody>
	</table>
	<!-- {{{{{{{{{{{{{{{{{{{{{{{{tabla de servicios}}}}}}}}}}}}}}}}}}}}}}}} -->

	<div class="desborde"></div><br>	
	<div class="form-group">
	    <label for="exampleInputFile">Adjuntar archivo</label>
	    <input type="file" id="exampleInputFile">
	</div><br>
	<textarea class="form-control" rows="4" placeholder="Descripción"></textarea>
	
	<h3>Asignar Roles</h3>
	<hr><br>
	<!-- {{{{{{{{{{{{{{{{{{{tabla de asignación de roles}}}}}}}}}}}}}}}}}}} -->
	<table class="table table-striped tbla_services2">
		<thead class="cabecera_serv2">
			<tr>						
			  <th>Empleado</th>
			</tr>
		</thead>
		<tbody id="tbody_empleados" class="scrolltbla">
		</tbody>
	</table>
	<!-- {{{{{{{{{{{{{{{{{{{tabla de asignación de roles}}}}}}}}}}}}}}}}}}} -->

	<table id="tbla_roles" class="table table-striped table-curved">      
		<thead>
			<tr id="color_th">							                
				<th>Empleados</th>
				<th>Roles</th>
				<th ></th>
			</tr>
	    </thead>
	    <tbody>
	    	<tr>
			    <td>Geyser gallardo ramirez snachez</td>		                
			    <td>Programador SR</td>							                
			    <td class="icon-eliminar">
				    <div class="eliminar_cliente">
				    	<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
				    </div>
			    </td>
	        </tr>
	        <tr>
		        <td>Jose alberto Canul May</td>				                
			    <td>Desarrollador de la api rest</td>
			    <td class="icon-eliminar">
				    <div class="eliminar_cliente">
				    	<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
				    </div>				                   
			    </td>
	        </tr>
	        <tr>
		        <td>Enrique xacur</td>				                
			    <td>Director general</td>
			    <td class="icon-eliminar">
				    <div class="eliminar_cliente">
				    	<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
				    </div>				                   
			    </td>
	        </tr>
		    <tr>
		        <td>Rodrigo Buenfil</td>				                
			    <td>Productor de vídeo y audio</td>
			    <td class="icon-eliminar">
				    <div class="eliminar_cliente">
				    	<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
				    </div>				                   
			    </td>
		    </tr>
	    </tbody>		
	</table>
	<div class="desborde"></div><br><br>		
	<button type="button" class="btn btn-primary">Aceptar</button>&nbsp;
	<button type="button" class="btn btn-danger">Cancelar</button>

		
</div> <!-- LA APERTURA DE ESTA ETIQUETA ESTÁ EN OTRO DOCUMENTO. NO BORRAR!! -->

<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });

</script>

<!-- plantillas -->
	<script type="text/template" id="option_cliente">
		<option value="<%- id %>" name="idcliente">  <%- nombreComercial %> </option>
	</script>

	<script type="text/template" id="tds_empleado">
		<td>
			<label data-toggle="modal" data-target="#<%- id %>"><%- nombre %></label>
			<div class="modal fade" id="<%- id %>">
				<div class="modal-dialog">
				    <div id="medida_modal" class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 style="color:#0492e6;"  class="modal-title">Asignar Rol</h4>
						</div>
						<div id="barra_rol">
							<h4><%- nombre %></h4>	
						</div><br><br>	
						<div class="modal-body">
							<input id="otro_rol" type="text" class="form-control" placeholder="otro rol">
							<button id="agregar_btn" type="button" class="btn btn-default">Agregar</button>
							<div class="desborde"></div>
							<label><h4 style="color:#0492e6;">Roles</h4></label>
							<div id="select_rol">				      	   
								<select multiple class="form-control" >
						  	   		<option data-toggle="modal" data-target="#myModal">Lider del proyecto</option>		
						  	   	    <option data-toggle="modal" data-target="#myModal">Community Manager</option>
									<option data-toggle="modal" data-target="#myModal">Diseñador Gráfico</option>
									<option data-toggle="modal" data-target="#myModal">Diseñador Gráfico Sr</option>
									<option data-toggle="modal" data-target="#myModal">Programador</option>
									<option data-toggle="modal" data-target="#myModal">Productor de Vídeo y Audio</option>
								</select>						    
							</div>						
							<table id="tbla_roles2" class="table table-striped">      
								<tr>
									<th>Roles Asignados</th>
									<th></th>
								</tr>
								<tr>
									<td>Programador SR</td>				                
									<td class="icon-eliminar">
										<div class="eliminar_cliente">
											<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
									    </div>
									</td>
								</tr>
								<tr>
							    	<td>Productor de video y audio</td>
							    	<td class="icon-eliminar">
										<div class="eliminar_cliente">
											<span class="icon-circledelete"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
									    </div>				                   
									</td>
								</tr>
							</table>				            
							<div class="desborde"></div>	  
						</div> 
						<div class="modal-footer" >
					      	<div id="botones">
						    	<button type="button" class="btn btn-default">Aceptar</button>&nbsp;&nbsp;
					          	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>				          		
					        </div>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</td>
	</script>

	<script type="text/template" id="tds_servicio">
		<tr>
			<td>
				<label for="<%- id %>"> <%- nombre %> </label>
				<div class="check_posicion">
		            <input type="checkbox" id="<%- id %>" name="nameServiciosInteres" value="<%- id %>">
		        </div>
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
		<script type="text/javascript" src="<?=base_url().'js/backbone/modelos/ModeloEmpleado.js'?>"></script>
	<!-- colecciones -->
		<!--<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionServicios.js'?>"></script>-->
		<!--<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionClientes.js'?>"></script>-->
		<script type="text/javascript" src="<?=base_url().'js/backbone/colecciones/ColeccionEmpleados.js'?>"></script>
	<!-- vistas -->
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaEmpleado.js'?>"></script>
		<script type="text/javascript" src="<?=base_url().'js/backbone/vistas/VistaNuevoProyecto.js'?>"></script>



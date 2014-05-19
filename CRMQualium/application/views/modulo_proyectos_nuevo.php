	<script src="js/jquery-ui-1.10.4.custom.js"></script>
   	<h3>Nuevo Proyecto</h3>
	<hr><br>
	<input type="text" class="form-control" placeholder="Nombre del proyecto">
	<input type="text" class="form-control" placeholder="Buscar Cliente">
	<span id="buscar" class="icon-search"></span><br>
	<table id="cabecera_fija2" class="table table-striped " >
		<thead>
			<tr>
				<th></th>
				<th>Servicios</th>				
				<th></th>
			</tr>
		</thead>
	</table>	
	<div id="servicios_proyecto">
		<table  class="table table-striped" >
			<tbody>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input id="cuadro_busqueda" type="text" class="form-control" placeholder="Otro servicio">
					</td>					
					<td class="icon-operaciones">
					 <span id="icono_mas" class="icon-uniF476"></span>
					</td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tarjeta de presentación frente</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Medallón</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tríptico</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>díptico</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Catálogo</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Tarjeta de presentación frente y vuelta</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Anuncio sencillo</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Menú de restaurante</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Diseño de caja</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Branding Completo</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Logo Animado</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Video Branding</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Campaña</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Aplicaciones de campaña</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web sencilla </td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web complicada (Mas de 5 secciones)</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Página Web con sistema interno</td>					
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>App sencilla</td>					
					<td></td>
				</tr>
			</tbody>
	   </table><br>
	</div><br>
	<!-- <select id="" class= "form-control" > 
    	<option value="" disabled style='display:none;'>Servicio</option> 
	    <option>Aplicacion movil </option> 
	    <option>Pagina web </option> 
	    <option>Video</option> 
	    <option>Redes sociales</option> 
	    <option>Mailing</option> 
	    <option>Branding</option>
	    <option>Logo</option> 
	    <option>App sencilla</option> 
	    <option selected disabled>Servicio</option>
    </select><br> -->
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
	<div class="desborde"></div><br><br>
	<div class="form-group">
	    <label for="exampleInputFile">Adjuntar archivo</label>
	    <input type="file" id="exampleInputFile">
    </div><br>
    <h3>Asignar Roles</h3>
	<hr><br>
    <div id="contenedor_select">
	    <div id="roles"><b>Empleados</b></div>
	    <div id="select_empleados">
		    <select multiple class="form-control">
				<option data-toggle="modal" data-target="#myModal">Abril Astrid Jimenez Sosa</option>
				<option data-toggle="modal" data-target="#myModal">Deysi Elizabeth Ortega Piste</option>
				<option data-toggle="modal" data-target="#myModal">Pablo Perez Hernandez</option>
				<option data-toggle="modal" data-target="#myModal">David Arturo Ricalde Ortega</option>
				<option data-toggle="modal" data-target="#myModal">Adriana María Arjona Pinzón</option>
				<option data-toggle="modal" data-target="#myModal">Dante Cervantes</option>
				<option data-toggle="modal" data-target="#myModal">Iváb Israel Villamil Covian</option>
				<option data-toggle="modal" data-target="#myModal">Gerardo Soria</option>
				<option data-toggle="modal" data-target="#myModal">Enrique Xacur</option>
				<option data-toggle="modal" data-target="#myModal">Gustavo Monforte</option>
				<option data-toggle="modal" data-target="#myModal">Rodrigo Buenfil</option>
			</select>
	    </div><br>
	    <textarea class="form-control" rows="4" placeholder="Descripción"></textarea>
	</div>
    <table id="tbla_roles" class="table table-striped table-curved">      
		<thead>
			<tr id="color_th">							                
				<th  >Empleados</th>
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
    
    <div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		    <div id="medida_modal" class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 style="color:#0492e6;"  class="modal-title">Asignar Rol</h4>
		      </div>
		      <div id="barra_rol">
		      	<h4>Roles de Ivan Villamil</h4>	
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
							<option data-toggle="modal" data-target="#myModal">Practicante</option>
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
</div>
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });

</script>
  </script>



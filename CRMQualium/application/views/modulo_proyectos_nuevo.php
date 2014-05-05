<<<<<<< HEAD
	<script src="js/jquery-ui-1.10.4.custom.js"></script>
    <h3>Nuevo Proyecto</h3>
=======
	<h3>Nuevo Proyecto</h3>
>>>>>>> 79d0511b0d7b05a40e6f4b5d51674abb33c1fdae
	<hr><br>
	<input type="text" class="form-control" placeholder="Nombre del proyecto">
	<select id="" class= "form-control" > 
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
    </select><br>
    <h5><b>Especifique la fecha de inicio y entrega del proyecto</b></h5><br>
    <div id="divfech">	    	
	    <h5><b>Inicio</b></h5>	    
	    <input class="form-control datepicker " type="text" id="fechaInicio">	    
	</div>
	<div class="divfech1">
		<h5><b>Entrega</b></h5>
		<input class="form-control datepicker fecha" type="text" id="fechaEntrega">	
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
    <div id="contenedor_select">
	    <div id="roles"><b>Empleados</b></div>
	    <div id="select_empleados">
		    <select multiple class="form-control">
				<option data-toggle="modal" data-target="#myModal">Geyser</option>
				<option data-toggle="modal" data-target="#myModal">Rodrigo</option>
				<option data-toggle="modal" data-target="#myModal">Beto</option>
				<option data-toggle="modal" data-target="#myModal">Dante</option>
				<option data-toggle="modal" data-target="#myModal">Xacur</option>
				<option data-toggle="modal" data-target="#myModal">Villamil</option>
				<option data-toggle="modal" data-target="#myModal">Gustavo</option>
				<option data-toggle="modal" data-target="#myModal">Adriana</option>
				<option data-toggle="modal" data-target="#myModal">Pablo</option>
				<option data-toggle="modal" data-target="#myModal">Rodrigo Buenfil</option>
			</select>
	    </div><br>
	    <textarea class="form-control" rows="4" placeholder="Descripción"></textarea>
	</div>
    <table id="tbla_roles" class="table table-striped">      
		<tr id="color_tr">							                
			<th>Empleados</th>
			<th>Roles</th>
			<th></th>
		</tr>
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
		      		<div class="desborde"></div>
		      		<label><h4 style="color:#0492e6;">Roles</h4></label>
			      	<div id="select_rol">				      	   
			      	   <select multiple class="form-control" size="5">		
							<option data-toggle="modal" data-target="#myModal">Director General</option>
							<option data-toggle="modal" data-target="#myModal">Director de T.I</option>
							<option data-toggle="modal" data-target="#myModal">Director de Arte</option>
							<option data-toggle="modal" data-target="#myModal">Gerente de Ventas</option>
							<option data-toggle="modal" data-target="#myModal">Gerente Administrativo</option>
							<option data-toggle="modal" data-target="#myModal">Jefe Community Manager</option>
							<option data-toggle="modal" data-target="#myModal">Diseñador</option>
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
				    	<button type="button" class="btn btn-default">Agregar</button>&nbsp;&nbsp;
			          	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>				          		
			        </div>
		        </div>
	        </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->	
</div>
<<<<<<< HEAD
=======

>>>>>>> 79d0511b0d7b05a40e6f4b5d51674abb33c1fdae
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
<<<<<<< HEAD
</script>
=======
  </script>
>>>>>>> 79d0511b0d7b05a40e6f4b5d51674abb33c1fdae


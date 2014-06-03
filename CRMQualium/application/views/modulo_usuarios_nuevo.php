	 <link rel="stylesheet" href="<?=base_url().'css/estilos_modulo_usuarios.css'?>" type="text/css">
	 <h3>Nuevo Usuario<h3>
	 <hr><br>	 
	 	<div class="row">
		  <div class="col-md-5">
		  		<form id="">
				  	<input type="search" class="form-control" placeholder="Empleado">
				  	<select class="form-control">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					  <option selected disabled>Perfil</option>
					</select>
				</form>			  	
		  </div>
		  <div class="col-md-6">		  	
			<input type="search" class="form-control" placeholder="Usuario">
			<input type="search" class="form-control" placeholder="Contraseña">
		  </div>
        </div><br>
        <h3>Asignar permisos</h3>
	    <hr>	  
	   <div class="row">
		  <div class="col-md-5">
		        <input id="ancho" type="search" class="form-control" placeholder="Nuevo">
	            <button type="button" class="btn btn-default">Agregar</button> 	
		  	   <select multiple class="form-control">
			      <option>Realizar cotizaciones</option>
				  <option>Ver contratos</option>
				  <option>Agregar Clientes</option>
				  <option>Ver proyectos</option>
				  <option>ver catalogos</option>		
		       </select>		  		
		  </div>
		  <div class="col-md-6">		  	
			<table id="permisos_asignados" class="table table-striped">
				<thead>
					<tr>
						<th>Permisos</th>
						<th></th>	
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Realizar cotizaciones</td>
						<td></td>
					</tr>
						<tr>
						<td>Ver contratos</td>
						<td></td>
					</tr>
						<tr>
						<td>Crear clientes</td>
						<td>
						</td>
					</tr>			

				</tbody>	

			</table>
		  </div>
        </div>
  </section>
</div>
<div id="posicion_infotd">
   <table id="tbla_cliente" class="table table-striped">      
       <tr>
           <th>&nbsp;&nbsp;&nbsp;Todos<br><input type="checkbox"></th>
           <th></th>
           <th>Nombre<input class="form-control" type="text" placeholder="Buscar"></th>           
           <th>Responsable<input class="form-control" type="text" placeholder="Buscar"></th>
           <th>Status</th>
           <th>&nbsp;&nbsp;Entrega</th>           
           <th>&nbsp;&nbsp;&nbsp;&nbsp;Operaciones</th>
       </tr>
       <tr>
           <td class="contenido_prospecto"><input  type="checkbox"></td>
           <td><img src="img/fotosClientes/cliente3.jpg" alt="" class="img-thumbnail"></td>
           <td>FoodBook</td>
                     
           <td>Ivan villamil</td>
           <td><span id="color_status" class="badge">45</span></td> 
           <td>04/06/2014</td> 
                  
           <td class="icon-operaciones">
               <div class="eliminar_cliente">
                    <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span> 
               </div>
               <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
               
               <span class="icon-eye"  data-toggle="modal" data-target="#myModal" title="Ver contacto"></span>
           </td>
       </tr>
       <tr>
           <td><input type="checkbox"></td>
           <td><img src="img/fotosClientes/cliente4.png" alt="" class="img-thumbnail"></td>
           <td>Kiper </td>                    
           <td>jose alberto canul may</td>
           <td><span id="color_status1" class="badge">50</span></td>
           <td>04/06/2014</td>            
           <td class="icon-operaciones">
               <div class="eliminar_cliente">
                 <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span> 
               </div>
               <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
               
               <span class="icon-eye"  data-toggle="modal" data-target="#myModal" title="Ver contacto"></span>
           </td>
        </tr>
        <tr>
           <td><input type="checkbox"></td>
           <td><img src="img/fotosClientes/cliente4.png" alt="" class="img-thumbnail"></td>
           <td>Kiper </td>
           <td>jose alberto canul may</td>
           <td><span id="color_status2" class="badge">50</span></td>           
           <td>04/06/2014</td>    
           <td class="icon-operaciones">
               <div class="eliminar_cliente">
                 <span class="icon-trash"   data-toggle="tooltip" data-placement="top" title="Eliminar"></span> 
               </div>
               <span class="icon-edit2"  data-toggle="tooltip" data-placement="top" title="Editar"></span>
               <span class="icon-email"  data-toggle="tooltip" data-placement="top" title="Enviar"></span>
               <span class="icon-eye"  data-toggle="modal" data-target="#myModal" title="Ver contacto"></span>
           </td>
        </tr>
   </table>
   <button type="button" class="btn btn-default">Eliminar varios</button> 
</div>
</div>
<!-- ---------------------------Modal consulta informacion del cliente---------- -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="panel-title"><h4>Información</h4></p>
                <span id="cerrar_consulta" class="glyphicon glyphicon-remove close" data-dismiss="modal" aria-hidden="true"></span>
            </div>
            <div id="contenido_cliente" class="panel-body">
            </div>
        </div>
    </div>
</div>
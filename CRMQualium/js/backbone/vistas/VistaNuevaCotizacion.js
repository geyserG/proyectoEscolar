var app = app || {};

app.VistaNuevaCotizacion = Backbone.View.extend({
	el : '.contenedor_principal_modulos',

	events : {
		
		'click 	.btndelete' : 'eliminarServicio',
		'click  #cliente'   : 'buscarCliente',
		'click 	#guardar'	: 'guardarCotizacion',
		'click  #todos'		: 'marcarTodosCheck',
		'keypress #cliente' : 'soloLetras'
	},

	marcarTodosCheck : function(elemento){
		$('.cajita').attr('checked', true);
	},

	initialize : function () {

		var fecha = new Date();

		this.$('#fecha').val(fecha.getDate()+'/'+fecha.getMonth()+'/'+fecha.getFullYear());
		this.$tablaServicios = this.$('#tablaServicios');
		this.cargarServiciosCo();
				
		//Datos de la cotizacion
		this.$idcliente 	  = this.$('#idcliente');
		this.$idrepresentante = this.$('#idrepresentante');		
		this.$fecha 		  = this.$('#fecha');		
		this.$detalles   	  = this.$('#detalles');
		
	},

	buscarCliente : function (elemento){ 	
	
		this.clientes = new Array();  var cont  = 0; 
		for(i in app.coleccionDeClientes)
		{
			this.clientes[cont] = app.coleccionDeClientes[i].nombreComercial; cont++;
			this.clientes[cont] = app.coleccionDeClientes[i].id; 			 cont++;			
		};

		$('#cliente').autocomplete({ source: this.clientes});
		var esto = this;
		$( "#cliente" ).on( "autocompleteselect", function( event, ui ) {			
			esto.buscarRepresentante(ui.item.value);
		});

	},

	// Validamos que el campo #cliente solo contenga letras
	soloLetras : function(e)
	{
	   key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
	},

	buscarRepresentante : function(pcliente)
	{
		var busca =0; var encontrado=0;
		representante = new Array();  var contr = 0;
		for(y in app.coleccionDeRepresentantes)
		{
			representante[contr] = app.coleccionDeRepresentantes[y].idcliente; contr++;
			representante[contr] = app.coleccionDeRepresentantes[y].id;        contr++;
			representante[contr] = app.coleccionDeRepresentantes[y].nombre;    contr++;
		};

		for(c in this.clientes)
		{			
			if(pcliente==this.clientes[busca])
			{ 			
				for(r in representante)
				{
					if(this.clientes[busca+1]==representante[encontrado])
					{ 
						$('#idcliente').val(this.clientes[busca+1]);
						$('#idrepresentante').val(representante[encontrado+1]);
						$('#representante').val(representante[encontrado+2]); break;
					}; encontrado++;
				};
				
			}; busca++;
		};			
		
	},

	render : function () {

		return this;
	},

	cargarServicioCo	: function (serviciosCotizacion) {
		var vistaServicioCotizacion = new app.VistaServicioCotizacion( { model:serviciosCotizacion } );
		this.$tablaServicios.append( vistaServicioCotizacion.render().el );
	},

	cargarServiciosCo : function (){
		app.coleccionServicios.each(this.cargarServicioCo, this);
	},

	eliminarServicio : function (elemento){
		$(elemento.currentTarget).parents('tr').remove();
		$('#tablaServicios #'+$(elemento.currentTarget).attr('id')).attr('disabled',false);
		$('#tablaServicios #'+$(elemento.currentTarget).attr('id')).attr('checked',false);
	},

	obtenerJsonPerfil : function () {

		return {
				id            	: '', 			
				idcliente 	  	:  this.$idcliente.val().trim(),
				idrepresentante :  this.$idrepresentante.val().trim(),
				idempleado      :  '',
				fecha 		  	:  this.$fecha.val().trim(),				
				detalles 	  	:  this.$detalles.val().trim()	
			};
	},

	guardarCotizacion : function (elemento){

		var modeloPerfil = this.obtenerJsonPerfil();
		console.log(modeloPerfil);

	}
	
});
app.vistaNuevaCotizacion = new app.VistaNuevaCotizacion();
//###########################################################

// AQUIE ESTA LA SEPARACION LO DE ARRIBA ES OTRA MADRE Y LO DE ABAJO ES OTRO DESMADRE...

// //###########################################################
// app.VistaTablaCotizaciones = Backbone.View.extend({
// 	tagName : 'tr',

// 	serviciosAgregado : _.template($('#serviciosAgregado').html()),

// 	events : {
// 		'click  .icon-uniF756' : 'habilitarEdicion',
// 		'keypress .visibleI'   : 'actualizar',
// 		// 'keypress  #oprecio'   : ''
//  	},

// 	initialize : function(){
// 		this.$mostrarTabla = this.$('#mostrarTabla');
// 	},

// 	render : function(){
// 		/* Recibe el modelo de la vista servicio cotización y la pinta en pantalla */
// 		this.$el.html(this.serviciosAgregado( this.model.toJSON() ));
// 		/* Esta función establece el importe con los datos por default del servicio...*/
// 		this.establecerImporte();
// 		return this;
// 	},
// 	/* Habilita los inputs para la edicion de servicios que estan en la lista de servicios cotizando...*/
// 	habilitarEdicion : function (elemento){		
// 		this.$el.children().children().toggleClass('visibleI');		
// 	},
 	
//  	 Una vez capturados los cambios actualiza la vista mostrada en pantalla del servicio cotizando...
// 	actualizar : function(elemento)
// 	{
// 		if(elemento.keyCode === 13) {
						
// 			this.$('#realizacion').text(this.$('#oduracion').val());
// 			this.$('#cantidad').text(this.$('#ocantidad').val());
// 			this.$('#precio').text(this.$('#oprecio').val());
// 			this.$('#descuento').text(this.$('#odescuento').val());			
// 			this.$el.children().children().toggleClass('visibleI');
// 			/* Despues de modificar los datos del servicio si hubo cambio
// 			   en los precios se deberá reflejar en el importe...*/
// 			this.establecerImporte();			
// 		};
// 	},

// 	/* Esta función obtiene los valores de la vista que se acaba de 
// 	   agregar o que se esta editando para sacar el importe del servicio...*/
// 	establecerImporte : function(){
// 		var cantidad  = this.$el.find('#cantidad').text();			
// 		var precio    = this.$el.find('#precio').text();
// 		var descuento = this.$el.find('#descuento').text();
// 		var importe   = (cantidad * precio) - descuento;
// 		this.$('#importe').text('$'+importe);
// 	}

// });

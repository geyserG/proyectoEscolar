var app = app || {};

app.VistaServicioCotizacion = app.VistaServicio.extend({
	tagName : 'tr',
	plantillaDefault  : _.template($('#PCservicios').html()),

	serviciosAgregado : _.template($('#serviciosAgregado').html()),

	events : {
		'click .icon-info'        : 'mostrarDetalles',
		'click .serviciosCotizar' : 'agregarServiciosCo',		
	},

	initialize : function () {
		this.$trServicio = this.$('#trServicio');		
	},

	mostrarDetalles : function (icono) {
		this.$el.children().children().toggleClass('visibleI');			
	},

	agregarServiciosCo : function (elemento){

		// Instanciamos un modelo de servicio
		var vistaTrServicio = new app.VistaTablaCotizaciones({model : this.model});
		/* Llamamos a la funcion render de la clase app.VistaTablaCotizaciones
		   para que la pinte la vista agregada...*/
		$('#trServicio').append(vistaTrServicio.render().el);
		// Dado que solo una vez se agrega el servicio lo desactivamos de la lista...
		this.$(elemento.currentTarget).attr('disabled',true);		
	}

});

//###########################################################
app.VistaTablaCotizaciones = Backbone.View.extend({
	tagName : 'tr',

	serviciosAgregado : _.template($('#serviciosAgregado').html()),

	events : {
		'click  .icon-uniF756' : 'habilitarEdicion',
		'keypress .visibleI'   : 'actualizar'
 	},

	initialize : function(){
		this.$mostrarTabla = this.$('#mostrarTabla');
	},

	render : function(){
		/* Recibe el modelo de la vista servicio cotización y la pinta en pantalla */
		this.$el.html(this.serviciosAgregado( this.model.toJSON() ));
		/* Esta función establece el importe con los datos por default del servicio...*/
		this.establecerImporte();
		return this;
	},
	/* Habilita los inputs para la edicion de servicios que estan en la lista de servicios cotizando...*/
	habilitarEdicion : function (elemento){		
		this.$el.children().children().toggleClass('visibleI');		
	},
 	
 	/* Una vez capturados los cambios actualiza la vista mostrada en pantalla del servicio cotizando...*/
	actualizar : function(elemento)
	{
		var total = 0;
		if(elemento.keyCode === 13) {
						
			this.$('#realizacion').text(this.$('#oduracion').val());
			this.$('#cantidad').text(this.$('#ocantidad').val());
			this.$('#precio').text(this.$('#oprecio').val());
			this.$('#descuento').text(this.$('#odescuento').val());	

			this.$el.children().children().toggleClass('visibleI');
			/* Despues de modificar los datos del servicio si hubo cambio
			   en los precios se deberá reflejar en el importe...*/
			// this.establecerImporte();	
			var impante   = Number(this.$('#importe').text());
			var cantidad  = this.$('#ocantidad').val();			
			var precio    = this.$('#oprecio').val();
			var descuento = this.$('#odescuento').val();		
			var importe   = (cantidad * precio) - descuento;
			this.$('#importe').text(importe);

			var importes = ($('#trServicio').find('.importes').text());

			$.each(importes);
			total+=total+(importes.importe);	
		
			// var totalantes = Number($('#total').text());
			// $('#total').text(importe);
			// var totaldespues = Number($('#total').text());

			// var total = totalantes + totaldespues;
			// total = total-totalantes;
			// $('#total').text(total);
		};
	},

	/* Esta función obtiene los valores de la vista que se acaba de 
	   agregar o que se esta editando para sacar el importe del servicio...*/
	establecerImporte : function(){

		var cantidad  = this.$('#ocantidad').val();			
		var precio    = this.$('#oprecio').val();
		var descuento = this.$('#odescuento').val();		
		var importe   = (cantidad * precio) - descuento;
		this.$('#importe').text(importe);

		
		// var totalantes = Number($('#total').text());
		// $('#total').text(importe);
		// var totaldespues = Number($('#total').text());

		// var total = totalantes + totaldespues;
		// $('#total').text(total);

	}

});


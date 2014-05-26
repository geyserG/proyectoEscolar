var app = app || {};

app.VistaNuevoServicio = Backbone.View.extend({
	el	: '#catalogo_servicio',
	events	: {
		'click .nombreServicio'	: 'obtenerNombre',
		'click #enviar'	: 'guardarServicio',
	},

	initialize	: function () {
		// this.$formServicio = this.$('#formServicio');
		this.$nombre		= this.$('#nombre');
		this.$concepto		= this.$('#concepto');
		this.$precio		= this.$('#precio');
		this.$masiva		= this.$('#masiva');
		this.$realizacion	= this.$('#realizacion');
		this.$descripcion	= this.$('#descripcion');
	},

	render	: function () { //Pintar
		// alert('Estoy en el render');this.guardarServicio();
		return this;
	},

	obtenerNombre	: function (elemento) {
		// console.log('el objeto dom',elemento);
		// console.log();
		// $(elemento.currentTarget).html();
	},

	guardarServicio	: function (elemento) {
		var modeloServicio = this.obtenerJsonServicio();
		// console.log(modeloServicio.nombre);
		
		Backbone.emulateHTTP = true; //Variables Globales
		Backbone.emulateJSON = true; //Variables Globales
		app.coleccionServicios.create(
			modeloServicio, 
			{
				wait: true, 
				success: function (exito) {
					console.log('Fue exito ',exito);
				},
				error: function (error) {
					console.log('Fue error ',error);
				}
			}
		);
		Backbone.emulateHTTP = false; //Variables Globales
		Backbone.emulateJSON = false; //Variables Globales

		elemento.preventDefault();
	},

	obtenerJsonServicio	: function () {
		return {
			nombre		: this.$nombre.val().trim(),
			concepto	: this.$concepto.val().trim(),
			precio		: this.$precio.val().trim(),
			masiva		: this.$masiva.val().trim(),
			realizacion	: this.$realizacion.val().trim(),
			descripcion	: this.$descripcion.val().trim()
		};
	}
});


app.vistaNuevoServicio = new app.VistaNuevoServicio();
var app = app || {};

app.VistaTelefono = Backbone.View.extend({
	tagName	: 'div',
	plantilla : _.template($('#plantilla_telefono').html()),
	events	: {
		'keypress .telefonosCliente'	: 'validarTelefono'
	},
	initialize	: function () {
		// this.listenTo(this.model, 'destroy', this.remove);
	},
	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		this.$editar = this.$('.editar');
		return this;
	},

	//---------------------------------------------

	editando	: function () {
		this.$editar.toggleClass('editando');
		return false;
	},

	actualizarAtributo	: function (elemento) {
		if (elemento.keyCode === 13) {
			validarTelefono(elemento);
			console.log($(elemento.currentTarget).val());
		};
	},

	validarTelefono	: function (elemento) {
		// if(isNaN($(elemento.currentTarget).val().trim()) && $(elemento.currentTarget).val().trim() != '' ) {
		if(!(/^\d{10}$/.test($(elemento.currentTarget).val().trim())) && $(elemento.currentTarget).val().trim() != '' ) {
	        alert('[ERROR:Teléfono]\n\nNo ingrese letras u otros símbolos\nEscriba 10 números\nEstablesca un tipo');
	        $(elemento.currentTarget).focus();
	        return;
	    };
	},
});
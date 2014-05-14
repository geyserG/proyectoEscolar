var app = app || {};

app.VistaTelefono = Backbone.View.extend({
	tagName	: 'div',
	plantilla : _.template($('#plantilla_telefono').html()),
	events	: {
		'keypress .telefonosCliente'	: 'actualizarAtributo'
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
			if (this.validarTelefono(elemento) === false) {
				return;
			};
			// console.log(pasarAJson($(elemento.currentTarget).serializeArray()));
			// return;
			this.model.save(
				pasarAJson(
					$(elemento.currentTarget).serializeArray()
				),
				{
					wait	: true,//Esperamos respuesta del server
					patch	: true,//Evitamos enviar todo el modelo
					success	: function (exito) {//Encaso del exito
						$(elemento.currentTarget)//Selector
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Removemos su atributo class
						.html('<label class="icon-uniF479 exito"></label>')
					},
					error	: function (error) {//En caso de error
						$(elemento.currentTarget)//Selector
						//Nos hubicamos en el padre del selector
						.parents('tr')
						//Buscamos al hijo con la clase especificada
						.children('.respuesta')
						//Sustituimos html por uno nuevo
						.html('<label class="icon-uniF478 error"></label>')
					}
				}
			);
		};
	},

	validarTelefono	: function (elemento) {
		// if(isNaN($(elemento.currentTarget).val().trim()) && $(elemento.currentTarget).val().trim() != '' ) {
		if(!(/^\d{10}$/.test($(elemento.currentTarget).val().trim())) && $(elemento.currentTarget).val().trim() != '' ) {
	        alert('[ERROR:Teléfono]\n\nNo ingrese letras u otros símbolos\nEscriba 10 números\nEstablesca un tipo');
	        $(elemento.currentTarget).focus();
	        return false;
	    } else{
	    	return true;
	    };
	},
});
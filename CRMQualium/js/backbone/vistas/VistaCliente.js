var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'tr',

	plantilla : _.template($('#plantilla_td_de_cliente').html()),

	events	: {
		'click #conmutar'	: 'verContactos' //Es el boton para ver CONTACTOS
	},

	initialize	: function () {
		this.listenTo(this.model, 'destroy', this.remove);
	},

	render	: function () {
		this.$el.append(this.plantilla( this.model.toJSON() ));
		// this.$iconoContactos = $('.icon-friends');
		this.$panelBody = this.$('.panel-body');
		// console.log(this.model.get('id'));
		
		// $('.idCliente').attr('value');
		// $('#tablaParaContactos').attr('id',this.model.get('id'));
		// console.log(this.$('.idCliente').attr('value'));
		// this.idCliente = this.model.get('id');
		return this;
	},

	verContactos	: function () {
		// console.log(this.$iconoContactos);
		// this.$('.icon-friends').removeAttr('title','');
		var title = this.$('.icon-friends').attr('title');//------------OBTENER EL "title" DEL BOTON "conmutar"
		
		if (title == 'Contactos') {//-----------------------------------CAMBIA EL "title"
			this.$('.icon-friends').attr('title','Información');	
		} else {
			this.$('.icon-friends').attr('title','Contactos');
		};
		
		this.$('.icon-friends').toggleClass('MO icon-back');//----------CAMBIA LA IMAGEN DEL BOTON

		this.$panelBody.children().toggleClass('oculto');
	}
});
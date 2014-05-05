var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'tr',

	plantilla : _.template($('#plantilla_td_de_cliente').html()),

	events	: {
		'click #contactosCliente'	: 'verContactos', //Es el boton para ver CONTACTOS
		'click .icon-trash'		: 'visibilidad', //Es el boton para esconder CLIENTES
		'click #editar'	: 'editando'
	},

	initialize	: function () {
		// this.listenTo(this.model, 'destroy', this.remove);
		this.listenTo(this.model, 'change', this.render);
		// this.listenTo(this.model, 'visible', this.eliminarDelDOM);
	},

	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		// this.$iconoContactos = $('.icon-friends');
		this.$editar = this.$('.editar');
		this.$btn_iconoEditar = this.$('#editar');
		this.$btn_iconoContactos = this.$('#contactosCliente');
		this.$panelBody = this.$('.panel-body');
		// console.log(this.model.get('id'));
		
		// $('.idCliente').attr('value');
		// $('#tablaParaContactos').attr('id',this.model.get('id'));
		// console.log(this.$('.idCliente').attr('value'));
		// this.idCliente = this.model.get('id');
		return this;
	},

	eliminarDelDOM	: function () {
		this.$el.remove();
	},

	verContactos	: function () {
		// console.log(this.$iconoContactos);
		// this.$('.icon-friends').removeAttr('title','');
		var title = this.$btn_iconoContactos.attr('title');//------------OBTENER EL "title" DEL BOTON "conmutar"
		
		if (title == 'Contactos') {//-----------------------------------CAMBIA EL "title"
			this.$btn_iconoContactos.attr('title','Información');	
		} else {
			this.$btn_iconoContactos.attr('title','Contactos');
		};
		
		this.$btn_iconoContactos.children().toggleClass('MO icon-back');//----------CAMBIA LA IMAGEN DEL BOTON

		this.$panelBody.children().toggleClass('oculto');
	},

	editando	: function () {
		this.$editar.toggleClass('editando');
		this.$btn_iconoEditar.children().toggleClass('MO icon-back');
	},

	visibilidad	: function() {
		if (confirm('Deseas eliminarlo?')) {
			this.$el.html('');
			this.model.cambiarVisibilidad();
		};
	}
});
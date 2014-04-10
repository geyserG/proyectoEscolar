var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'h5',

	plantilla : _.template($('#listaClientes').html()),

	events	: {
	},

	initialize	: function () {
		this.listenTo(this.model, 'destroy', this.remove);
	},

	render	: function () {
		this.$el.append(this.plantilla( this.model.toJSON() ));
		return this;
	}
});
var app = app || {};

app.VistaCliente = Backbone.View.extend({
	tagName	: 'tr',

	plantilla : _.template($('#plantilla_td_de_cliente').html()),

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
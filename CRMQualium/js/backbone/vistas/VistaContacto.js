var app = app || {};

app.VistaContacto = Backbone.View.extend({
	tagName	: 'h5',

	plantilla : _.template($('#listaContacto').html()),

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

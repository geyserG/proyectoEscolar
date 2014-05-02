var app = app || {};

app.VistaServicio = Backbone.View.extend({
	tagName		: 'li',
	// className	: 'has-sub',
	// plantilla	: _.template($('#serviciosI').html()),
	events	: {},
	initialize	: function () {},
	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		return this;
	},
});

app.VistaServicioInteres = app.VistaServicio.extend({
	plantilla	: _.template($('#serviciosI').html()),
});

app.VistaServicioCuenta = app.VistaServicio.extend({
	plantilla	: _.template($('#serviciosC').html()),
});
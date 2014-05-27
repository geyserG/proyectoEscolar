var app = app || {};

app.VistaEmpleado = Backbone.View.extend({
	tagName	: 'tr',
	events	: {
	},

	plantilla : _.template($('#tds_empleado').html()),

	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		return this;
	}
});
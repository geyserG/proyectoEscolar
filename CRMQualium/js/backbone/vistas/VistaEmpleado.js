var app = app || {};

app.VistaEmpleado = Backbone.View.extend({
	tagName	: 'option',
	// data-toggle	: 'modal',
	// data-target	: '#myModal',

	plantilla : _.template($('#option_empleado').html()),

	render	: function () {
		this.$el.html(this.plantilla( this.model.toJSON() ));
		return this;
	}
});
var app = app || {};
app.VistaNuevoProyecto = Backbone.View.extend({
	el	: '.contenedor_principal_modulos',
	initialize	: function () {
		console.log(this.$el.html());
	}
});

app.vistaNuevoProyecto = new app.VistaNuevoProyecto();
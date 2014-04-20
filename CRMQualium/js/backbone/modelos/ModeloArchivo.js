var app = app || {};

app.ModeloArchivo = Backbone.Model.extend({
	defaults	: {
			nombre	: '',
			  tipo	: '',
		comentario	: ''
	}
});
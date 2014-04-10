var app = app || {};

app.ModeloContacto = Backbone.Model.extend({
	defaults	: {
			   idContacto : '',
				idCliente : '',
		   nombreContacto : '',
   		   correoContacto : '',
    		cargoContacto : '',
		telefonosContacto : ''
	}
});
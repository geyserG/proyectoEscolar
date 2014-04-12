var app = app || {};

app.ModeloContacto = Backbone.Model.extend({
	defaults	: {
			   // idContacto : '',
				// idCliente : '',
			 tipoContacto : '',
		   nombreContacto : '',
   		   correoContacto : '',
    		cargoContacto : '',
		telefonosContacto : ''
	}
});
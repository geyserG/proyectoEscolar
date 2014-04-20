var app = app || {};

app.ModeloContacto = Backbone.Model.extend({
	defaults	: {
			    idCliente : '',
			 tipoContacto : '',
		   nombreContacto : '',
   		   correoContacto : '',
    		cargoContacto : '',
		telefonosContacto : ''
	}
});
var app = app || {};

app.ModeloClente = Backbone.Model.extend({
	defaults	: {
					 idCliente : '',
		           tipoCliente : '',
		          nombreFiscal : '',
		       nombreComercial : '',
		                   rfc : '',
		             paginaWeb : '',
		                 email : '',
		      telefonosCliente : '',
		                  giro : '',
		             direccion : '',
		      serviciosInteres : '',
		       serviciosCuenta : '',
					  archivos : '',
				 representante : '',
		   correoRepresentante : '',
			cargoRepresentante : '',
		telefonosRepresentante : '',
		        nombreContacto : '',
		        correoContacto : '',
		         cargoContacto : '',
		     telefonosContacto : ''
	}
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
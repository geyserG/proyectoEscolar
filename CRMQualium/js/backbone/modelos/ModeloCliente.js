var app = app || {};

app.ModeloClente = Backbone.Model.extend({
	defaults	: {
			   nombreComercial : '', // [1,quialium]
			      nombreFiscal : '',
			             email : '',
			               rfc : '',
			         paginaWeb : '',
			              giro : '',
			 comentarioCliente : '',
			         direccion : '',
			       tipoCliente : '',
			  telefonosCliente : '',
			  serviciosInteres : '',
			   serviciosCuenta : '',
			              logo : '',
	}
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
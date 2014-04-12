var app = app || {};

app.ModeloClente = Backbone.Model.extend({
	defaults	: {
					 // idCliente : '',
			   nombreComercial : '', // [1,quialium]
			      nombreFiscal : '',
			             email : '',
			               rfc : '',
			         paginaWeb : '',
			              giro : '',
			         direccion : '',
			       tipoCliente : '',
			  telefonosCliente : '',
			  serviciosInteres : '',
			   serviciosCuenta : ''
					  // archivos : '',
		// 		 representante : '',
		//    correoRepresentante : '',
		// 	cargoRepresentante : '',
		// telefonosRepresentante : '',
		//         nombreContacto : '',
		//         correoContacto : '',
		//          cargoContacto : '',
		//      telefonosContacto : ''
	}
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
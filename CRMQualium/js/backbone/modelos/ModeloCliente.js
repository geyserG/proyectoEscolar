var app = app || {};

app.ModeloCliente = Backbone.Model.extend({

	urlRoot	:'http://crmqualium.com/api_clientes/'

	defaults	: {
			 //   nombreComercial : '', // [1,quialium]
			 //      nombreFiscal : '',
			 //             email : '',
			 //               rfc : '',
			 //         paginaWeb : '',
			 //              giro : '',
			 // comentarioCliente : '',
			 //         direccion : '',
			 //       tipoCliente : '',
			 //  telefonosCliente : '',
			 //  serviciosInteres : '',
			 //   serviciosCuenta : '',
			 //              logo : '',
			 visibilidad : true
	},

	cambiarVisibilidad: function () {
		this.save({
			visibilidad: !this.get('visibilidad')
		});
	}

	// validate: function (atributos, opciones) {
	// 	if (atributos.end < atributos.start) {
	// 		console.log(atributos);
	// 		console.log(opciones);
	// 	}
	// }
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
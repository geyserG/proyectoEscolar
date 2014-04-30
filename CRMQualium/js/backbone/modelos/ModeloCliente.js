var app = app || {};

app.ModeloCliente = Backbone.Model.extend({

	urlRoot	:'http://crmqualium.com/api_cliente',

	defaults	: {
			   // nombreComercial : '',
			 //      nombreFiscal : '',
			 //             email : '',
			 //               rfc : '',
			 //         paginaWeb : '',
			 //              giro : '',
			 // comentarioCliente : '',
			 //         direccion : '',
			       // tipoCliente : '',
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
	},

	validate: function (atributos) {
		if (atributos.nombreComercial == "") {
			alert('especifique el un nombre para el cliente');
		}
		if (atributos.tipoCliente == "") {
			alert('especifique el tipo de cliente');
		}
	}
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
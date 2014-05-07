var app = app || {};
var f = new Date();
var v;
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
					  visibilidad : 1,
					fechaCreacion : f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate()
	},

	cambiar: function () {
		this.save({visibilidad: v },{wait:true});
	},

	cambiarVisibilidad 	: function () {
		if (this.get('visibilidad') === 1) {
			v = 0;
		} else{
			v = 1;
		};

		this.cambiar();
	},
	// conmutar	: function () {
	// 		if (this.get('visibilidad') == 0) {
	// 			return 1;
	// 		} else{
	// 			return 0;
	// 		};
	// 	}
	// validate: function (atributos) {
	// 	if (atributos.nombreComercial == "") {
	// 		alert('especifique el un nombre para el cliente');
	// 	}
	// 	if (atributos.tipoCliente == "") {
	// 		alert('especifique el tipo de cliente');
	// 	}
	// },

	// fechaCreacion : function () {
	 	
	//  	return '' + f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate() + '';
	// }
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
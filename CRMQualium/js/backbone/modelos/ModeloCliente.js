var app = app || {};

app.ModeloClente = Backbone.Model.extend({
	defaults	: {
					 tipoCliente : 'prospecto',
		            nombreFiscal : 'Calidad Integral en Limpieza, S.A. de C.V.',
		         nombreComercial : 'Quality',
		                   email : 'quality@quality.com',
		               telefonos : '1234567890',
		                    giro : 'Servicios',
		               direccion : 'Calle 58 15 y 17 Col. Centro',
		        serviciosInteres : 'Página Web',
			  	 serviciosCuenta : 'app movil',
		                archivos : 'direccion fisica',
		              comentario : 'Quiere una página donde se muestre un hola mundo',
		                     rfc : 'FSS32423E',
		           representante : 'Vicente Fernandez',
		               paginaWeb : 'quality.com.mx.gob.es.cl.etc',
		          nombreContacto : 'Pedrito Fernandez',
		          correoContacto : 'pedrito@hotmail.com',
		           cargoContacto : 'Mariachi',
		       telefonosContacto : '0987654321',
	}
});

// app.clienteDefault = new app.ModeloClente();
// console.log(app.clienteDefault.toJSON()); //Imprime el modelo
// console.log(app.clienteDefault.get('tipoCliente')); //Imprime el atributo especificado
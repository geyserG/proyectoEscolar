var app = app || {};

app.ModeloServicioCliente = Backbone.Model.extend({

	// urlRoot	:'http://crmqualium.com/api_servicios',
	defaults	: {
		status	: true
	},

	cambiarStatus	: function () {
		this.save({ status: !this.get('status') },{wait:true});
	}
});
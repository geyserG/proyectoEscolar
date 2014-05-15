var app = app || {};

app.ModeloServicioCliente = Backbone.Model.extend({

	// urlRoot	:'http://crmqualium.com/',
	defaults	: {
		status	: true
	},

	cambiarStatus	: function () {
		this.save({ status: !this.get('status') },{wait:true});
	}
});
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

var userProfile = new Vue({
	debug : true,

	el : '#profile',

	data : {
		processing : false,
		showAlert : false,
		showEmailModal : false,
		showPasswordModal : false,
		user : {
			id          : null,
			email       : null,
			oldPassword : null,
			newPassword : null
		},
		alertMessage : ''
	},

	methods : {
		updateEmail : function ()
		{
			this.processing = true;
			this.$http.patch('/api/user/' + this.user.id, {'email': this.user.email}).then(function (response) {
				this.showEmailModal = false;
				if (response.data.status === 'OK') {
					this.processing = false;
					this.alertMessage = response.data.message;
					this.showAlert = true;
					location.reload();
				} else {
					this.processing = false;
					this.alertMessage = response.data.message;
					this.showAlert = true;
				}
			});
		},
		updatePassword : function ()
		{

		}
	},

	components : {
		'modal' : VueStrap.modal,
		'alert' : VueStrap.alert
	}
});
//# sourceMappingURL=app.js.map

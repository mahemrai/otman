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

            var requestData = {
                'email' : this.user.email
            }

            this.$http.patch('/api/user/' + this.user.id, requestData).then(function (response) {
                this.showEmailModal = false;
                if (response.data.status === 1) {
                    this.processing = false;
                    this.alertMessage = response.data.message;
                    this.showAlert = true;
                    location.reload();
                } else if(response.data.status === 2) {
                    this.processing = false;
                    this.alertMessage = response.data.message;
                    this.showAlert = true;
                } else {
                    this.procession = false;
                    this.alertMessage = response.data.message;
                }
            });
        },
        updatePassword : function ()
        {
            this.processing = true;

            var requestData = {
                'currentPassword' : this.user.oldPassword,
                'newPassword'     : this.user.newPassword
            };

            this.$http.patch('/api/user' + this.user.id, requestData).then(function(response) {

            });
        }
    },

    components : {
        'modal' : VueStrap.modal,
        'alert' : VueStrap.alert
    }
});
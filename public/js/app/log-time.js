Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

var logTime = new Vue({
    debug: true,

    el: '#log-time',

    data: {
        processing: false,
        showSuccessAlert: false,
        showModal: false,
        overtimes: null,
        overtime: null,
        timeLog: null,
        alertMessage: '',
    },

    ready: function ()
    {
        this.loadOvertimes();
    },

    methods: {
        loadOvertimes: function ()
        {
            var element = document.getElementById('log-time');
            this.$http.get('/api/user/' + element.dataset.user + '/overtimes').then(function (response) {
                this.overtimes = response.data.overtimes;
                console.log(this.overtimes);
            });
        },

        loadOvertime: function(id)
        {
            this.showModal = true;
            this.processing = true;

            this.$http.get('/api/overtime/' + id).then(function (response) {
                this.overtime = response.data.overtime;
            });
        },

        logTime: function ()
        {
            this.processing = true;

            var requestData = {
                'time': this.timeLog
            };

            this.$http.patch('/api/overtime/' + this.overtime.id, requestData).then(function (response) {
                if (response.data.code === 1) {
                    this.processing = false;
                    this.alertMessage = response.data.message;
                    this.showSuccessAlert = true;
                    this.showModal = false;
                    location.reload();
                }
            });
        }
    },

    components: {
        'modal': VueStrap.modal,
        'alert': VueStrap.alert
    }
});

logTime.loadOvertimes();
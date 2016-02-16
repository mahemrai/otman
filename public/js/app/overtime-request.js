var overtimeRequest = new Vue({
    debug: true,
    el: '#datepicker',
    components: {
        'datepicker': VueStrap.datepicker
    },
    data() {
        return {
            disabled: [],
            value: '2016-01-04',
            format: ['yyyy-MM-dd']
        }
    },
    watch: {
        disabled() {
            this.$.dp.getDateRange()
        },
        format(newV) {
            this.value = this.$.dp.stringify(new Date(this.value))
        }
    }
});
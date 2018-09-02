Nova.booting((Vue, router) => {
    Vue.component('index-nova-places', require('./components/IndexField'));
    Vue.component('detail-nova-places', require('./components/DetailField'));
    Vue.component('form-nova-places', require('./components/FormField'));
})

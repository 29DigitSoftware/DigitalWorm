require('./bootstrap');

window.Vue = require('vue');

import router from './router';
import store from './store'
import touch from 'vue-directive-touch'
import './assets/styles/icon.css'
import './assets/styles/global.scss'
import App from './App.vue'
import ReadMore from 'vue-read-more';
import NProgress from 'vue-nprogress'

Vue.use(touch);
Vue.use(ReadMore);
Vue.use(NProgress);

const nprogress = new NProgress()

const app = new Vue({
    el: '#app',
    nprogress,
    router,
    store,
    render: h => h(App)
}).$mount('#app');
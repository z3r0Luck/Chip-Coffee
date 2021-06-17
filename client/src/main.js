import Vue from 'vue';
import store from './store/store';
import router from './router';
import App from '@/App.vue';
import VueCookies from 'vue-cookies';
import Notifications from 'vue-notification';
import Vuelidate from 'vuelidate';
import VueContentPlaceholders from 'vue-content-placeholders';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(Notifications);
Vue.use(VueCookies);
Vue.use(Vuelidate);
Vue.use(VueContentPlaceholders);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.config.productionTip = false;

new Vue({
	store,
	router,
	render: h => h(App)
}).$mount('#app');
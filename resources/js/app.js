require('./bootstrap');
window.Vue = require('vue');
import Vue from "vue";
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import App from './component/App.vue';
import Form from "vform";
import "bootstrap-vue/dist/bootstrap-vue.css";
// import router from './router.js';
// import MainPage from './component/MainPage.vue';
// import ProcessPage from './component/ProcessPage.vue';
// import InformationPage from './component/InformationPage.vue';
// import Report from './component/Report.vue';

Vue.use(BootstrapVue)
Vue.use(VueRouter);

window.Form = Form;

const routes = [
    // { path: '/load/:id',  component: MainPage },
    // { path: '/allboxes/:id',  component: MainPage },
    // { path: '/receive/:id', component: MainPage },
    // { path: '/unload/:id', component: MainPage },
    // { path: '/releaseonhold/:id', component: MainPage },
    // {path: '/loadprocess/:id',  component: ProcessPage},
    // {path: '/receiveprocess/:id',  component: ProcessPage},
    // {path: '/dispatch/:id',  component: InformationPage},
    // {path: '/boxhistory/:id',  component: InformationPage},
    // {path: '/arrival/:id',  component: InformationPage},
    // {path: '/report',  component: Report},
]

const router = new VueRouter({
    mode: 'history',
    routes: routes,
});
 

const app = new Vue({
	router
}).$mount('#app');
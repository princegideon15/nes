/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('applications-component', require('./components/ApplicationsComponent.vue').default);
Vue.component('appdata-component', require('./components/AppDataComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);

// admin
Vue.component('admin-applications-component', require('./components/Admin/ApplicationsComponent.vue').default);
Vue.component('users-component', require('./components/Admin/UsersComponent.vue').default);
Vue.component('clients-component', require('./components/Admin/ClientsComponent.vue').default);
Vue.component('user-settings-component', require('./components/Admin/UserSettingsComponent.vue').default);
Vue.component('email-notifications-component', require('./components/Admin/EmailNotificationsComponent.vue').default);
Vue.component('view-data-component', require('./components/Admin/AppDataComponent.vue').default);
Vue.component('admin-profile-component', require('./components/Admin/AdminProfileComponent.vue').default);
Vue.component('reports-component', require('./components/Admin/ReportsComponent.vue').default);

//Vue.component('manage-email-notification-component', require('./components/Admin/ManageEmailNotificationComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

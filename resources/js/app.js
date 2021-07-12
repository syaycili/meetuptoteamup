require('./bootstrap');

// Require Vue
window.Vue = require('vue').default;
// Register Vue Components
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-component', require('./components/Chat/container.vue').default);
// Initialize Vue
const app = new Vue({
    el: '#app',
});

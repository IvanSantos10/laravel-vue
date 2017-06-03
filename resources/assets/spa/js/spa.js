import LocalStorege from './services/localStorege';

require('materialize-css');
window.Vue = require('vue');
require('vue-resource');
Vue.http.options.root = "http://0.0.0.0:8000/api";

require('./router');

LocalStorege.setObject('user', {name: 'Ivan Santos', id: 1});
console.log(LocalStorege.getObject('user'));
// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

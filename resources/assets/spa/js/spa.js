import LocalStorege from './services/localStorege';
import appConfig from './services/appConfig';

require('materialize-css');
window.Vue = require('vue');
require('vue-resource');
Vue.http.options.root = appConfig.api_url;

require('./services/interceptiors');
require('./router');
console.log(appConfig.login_url)
// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

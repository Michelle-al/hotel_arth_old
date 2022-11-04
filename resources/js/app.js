import router from "./router";

require('./bootstrap');
import { createApp} from 'vue';
import App from './App.vue';

createApp(App).use(router)
    .mount('#app')


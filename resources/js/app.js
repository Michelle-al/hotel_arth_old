import router from "./router";

require('./bootstrap');
import { createApp} from 'vue';
import App from './App.vue';
import {createPinia} from "pinia";

createApp(App).use(router)
    .use(createPinia())
    .mount('#app')


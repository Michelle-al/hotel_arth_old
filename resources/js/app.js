import router from "./router";

require('./bootstrap');
import { createApp} from 'vue';
import App from './App.vue';
import {createPinia} from "pinia";
import {useLangStore} from "./store/langStore";

createApp(App).use(router)
    .use(createPinia())
    .mount('#app')

axios.interceptors.request.use(
    function (config) {
        const langStore = useLangStore();
        config.headers['Accept-Language'] = langStore.lang;
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);


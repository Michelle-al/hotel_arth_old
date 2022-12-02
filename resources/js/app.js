
require('./bootstrap');
import {createApp} from 'vue';
import App from './App.vue';
import {createPinia} from "pinia";
import router from "./router";
import { createI18n } from "vue-i18n";
import {translations} from "../translations/translations";


// const translations = {
//     en: {
//         navbar: {
//             navbarRooms: 'Our rooms',
//             navbarAdvantages: 'Our advantages',
//             navbarReviews: 'Clients reviews',
//             'navbarNews': 'Our news',
//             'navbarConnect': 'Login',
//             'navbarReservation': ""
//         }
//     },
//     fr: {
//         navbar: {
//             navbarRooms: 'Nos chambres',
//             'navBarAdvantages': 'Nos avantages',
//             'navbarReviews': 'Avis de nos clients',
//             'navbarNews': 'Notre actualités',
//             'navbarConnect': 'Me connecter',
//         }
//     }
// }

export const i18n = createI18n({
    locale: localStorage.lang || 'fr',
    messages: translations
})

createApp(App).use(router)
    .use(createPinia())
    .use(i18n)
    .mount('#app')


// Axios interceptor modifies HTTP header before the request is sent back to Laravel
axios.interceptors.request.use(
    function (config) {
        config.headers['Accept-Language'] = localStorage.lang;
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

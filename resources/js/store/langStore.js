import { defineStore } from 'pinia'

// Gets the navigator locale to set the first value if there isn't a local storage yet
const navigatorLocale = ( navigator.languages && navigator.languages.length ? navigator.languages[0] : navigator.language);

export const useLangStore = defineStore('lang', {
    state: () => ({ lang: localStorage.lang ? localStorage.lang : navigatorLocale}),
    getters: {

    },
    actions: {
        switchLocale(lang) {
            this.lang = lang;
            // Stores language in localStorage for data persistence
            localStorage.lang = this.lang;
            // Side effect... Reloads page to send new requests to API with the new language
            window.location.reload();
        }
    }
})

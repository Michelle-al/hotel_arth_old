import { defineStore } from 'pinia'

export const useLangStore = defineStore('lang', {
    state: () => ({ lang: ""}),
    getters: {

    },
    setters: {
        switchLocale(lang) {
            this.lang = lang;
        }
    }
})

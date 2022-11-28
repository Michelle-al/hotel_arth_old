import { defineStore } from 'pinia'

export const useLangStore = defineStore('lang', {
    state: () => ({ lang: ""}),
    getters: {

    },
    actions: {
        switchLocale(lang) {
            this.lang = lang;
        }
    }
})

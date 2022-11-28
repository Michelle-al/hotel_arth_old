<template>
    <div class="section__navbar">
<!--        <button @click="isFrench = !isFrench" class="navbar__button">-->
<!--            <img v-if="isFrench"-->
<!--                 :src="french.image.source"-->
<!--                 class="navbar__flag navbar__flag&#45;&#45;french"-->
<!--                 :alt="french.image.alt">-->
<!--            <img v-else-->
<!--                 :src="english.image.source"-->
<!--                 class="navbar__flag navbar__flag&#45;&#45;english"-->
<!--                 :alt="english.image.alt">-->
<!--        </button>-->
        <select name="lang" v-model="lang" @change="switchLocale(lang)" class="navbar__button">
            <option selected="selected" value="fr">
            <img
                 :src="french.image.source"
                 class="navbar__flag navbar__flag--french"
                 :alt="french.image.alt">
            </option>
            <option value="en">
            <img
                 :src="english.image.source"
                 class="navbar__flag navbar__flag--english"
                 :alt="english.image.alt">
            </option>
        </select>
    </div>

</template>

<script>
import { mapStores } from 'pinia';
import {useLangStore} from "../store/langStore";
import {mapActions} from "pinia";

export default {
    name: "LanguagesToggleButton.vue",
    data() {
        return {
            lang: "",
            isFrench: true,
            french:
                {
                    name: 'Français',
                    href: '#',
                    image: {
                        source: '/storage/pictures/flag-french.jpg',
                        alt: "Drapeau Français"
                    },
                },
            english: {
                name: 'English',
                href: '#',
                image: {
                    source: '/storage/pictures/flag-english.jpg',
                    alt: "Drapeau Anglais"
                },
            },
        }
    },
    computed: {
        ...mapStores(useLangStore)
    },
    methods: {
        ...mapActions(useLangStore, ['switchLocale'])
    },

}
</script>

<style scoped>

.section__navbar {
    /*@apply w-1/12;*/
}
.navbar__button{
    @apply px-0 py-0;
}

.navbar__flag {
    @apply mt-0 max-h-5 h-auto;
}
.navbar__flag--french {
    /*@apply ;*/
}

.navbar__flag--english {
    /*@apply ;*/
}
</style>

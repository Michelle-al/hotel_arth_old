<template>
    <div class="section__navbar">
        <button @click="isFrench = !isFrench" class="navbar__button">
            <img v-if="isFrench"
                 :src="french.image.source"
                 class="navbar__flag navbar__flag--french"
                 :alt="french.image.alt">
            <img v-else
                 :src="english.image.source"
                 class="navbar__flag navbar__flag--english"
                 :alt="english.image.alt">
        </button>
    </div>

</template>

<script>
export default {
    name: "LanguagesToggleButton.vue",
    data() {
        return {
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

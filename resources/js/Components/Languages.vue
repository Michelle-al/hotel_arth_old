<template>
    <button @click="isFrench = !isFrench">
        <img v-if="isFrench"
             :src="french.image.source"
             class="section__navbar--flag-english m-0"
             :alt="french.image.alt">
        <img v-else
             :src="english.image.source"
             class="section__navbar--flag-english"
             :alt="english.image.alt">
    </button>
</template>

<script>
export default {
    name: "Languages.vue",
    data() {
        return {
            isFrench: true,
            french:
                {
                    name: 'Français',
                    href: '#',
                    image: {
                        source: '/storage/pictures/flag-french.png',
                        alt: "Drapeau Français"
                    },
                },
            english: {
                name: 'English',
                href: '#',
                image: {
                    source: '/storage/pictures/flag-english.png',
                    alt: "Drapeau Anglais"
                },
            },
        }
    },

}
</script>

<style scoped>

</style>

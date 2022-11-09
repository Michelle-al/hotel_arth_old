<template>
    <nav>
        <router-view />
        <Footer />
    </nav>
</template>

<script>
import Footer from './Components/Footer.vue'

export default {
    name: "App.vue",
    components: { Footer },
    mounted() {
        console.log("coucou vue test");
    },
    beforeCreate() {
        console.log('je suis un hook beforeCreate');
    },
    beforeMount() {
        console.log('je suis un hook beforeMount');
    }
}
</script>



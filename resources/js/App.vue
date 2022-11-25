<template>
    <div>
        <Navbar />
        <router-view />
        <Footer />
    </div>
</template>

<script>
import Footer from './Components/Footer.vue'
import Navbar from "./Components/Navbar";

export default {
    name: "App.vue",
    components: { Navbar, Footer }
}
</script>



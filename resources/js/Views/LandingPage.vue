<template>
    <h1>I'm the landing page</h1>
    <Hero />
    <PromotionalBanner />
</template>

<script>
import Hero from '../Components/Hero'
import PromotionalBanner from "../Components/PromotionalBanner"

    export default {
        name: 'landingPage',
        components: {
            Hero,
            PromotionalBanner
        }
    }
</script>

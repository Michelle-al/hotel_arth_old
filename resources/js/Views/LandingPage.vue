<template>
    <h1>I'm the NavBar</h1>
    <Hero />
<!--    <PromotionalBanner />-->
    <VideoSection />
</template>

<script>
import Hero from '../Components/Hero'
import PromotionalBanner from "../Components/PromotionalBanner"
import VideoSection from "../Components/VideoSection";


    export default {
        name: 'landingPage',
        components: {
            Hero,
            PromotionalBanner,
            VideoSection,
        }
    }
</script>

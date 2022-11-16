<template>
    <h1>I'm the landing page</h1>
    <Hero />
    <Promotional_banner />
    <VideoSection />
</template>

<script>
import Hero from '../Components/Hero'
import Promotional_banner from "../Components/Promotional_banner"
import VideoSection from "../Components/VideoSection";

    export default {
        name: 'landingPage',
        components: {
            Hero,
            Promotional_banner,
            VideoSection,
        }
    }
</script>

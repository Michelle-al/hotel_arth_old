<template>
    <Navbar />
    <Hero />
    <PromotionalBanner />
    <VideoSection />
</template>

<script>
import Hero from '../Components/Hero';
import PromotionalBanner from "../Components/PromotionalBanner";
import VideoSection from "../Components/VideoSection";
import Navbar from "../Components/Navbar";


    export default {
        name: 'landingPage',
        components: {
            Navbar,
            Hero,
            PromotionalBanner,
            VideoSection,
        }
    }
</script>

<template>
    <Navbar />
    <Hero />
    <PromotionalBanner />
    <VideoSection />

    <Advantages />
</template>

<script>
import Hero from '../Components/Hero';
import PromotionalBanner from "../Components/PromotionalBanner";
import VideoSection from "../Components/VideoSection";
import Navbar from "../Components/Navbar";
import Advantages from "../Components/Advantages";


    export default {
        name: 'landingPage',
        components: {
            Navbar,
            Hero,
            PromotionalBanner,
            VideoSection,
            Advantages
        }
    }
</script>

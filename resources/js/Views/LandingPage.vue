<template>
    <Navbar />
    <Hero />
    <PromotionalBanner />
    <VideoSection />
    <RoomCategory />
</template>

<script>
import Hero from '../Components/Hero';
import PromotionalBanner from "../Components/PromotionalBanner";
import VideoSection from "../Components/VideoSection";
import RoomCategories from "../Components/RoomCategories"
import Navbar from "../Components/Navbar";


    export default {
        name: 'landingPage',
        components: {
            Navbar,
            Hero,
            PromotionalBanner,
            VideoSection,
            RoomCategories
        }
    }
</script>

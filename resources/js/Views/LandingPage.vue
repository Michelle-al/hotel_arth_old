<template>
    <Hero />
    <PromotionalBanner />
    <div class="max-w-screen-xl lg:mx-auto">
        <VideoSection />
        <RoomCategories />
    </div>
</template>

<script>
import Hero from '../Components/Hero';
import PromotionalBanner from "../Components/PromotionalBanner";
import VideoSection from "../Components/VideoSection";
import Advantages from "../Components/Advantages";
import RoomCategories from "../Components/RoomCategories"

    export default {
        name: 'landingPage',
        components: {
            Hero,
            PromotionalBanner,
            VideoSection,
            Advantages
            RoomCategories
        }
    }
</script>

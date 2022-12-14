<template>
    <Hero />
    <PromotionalBanner />
    <div class="max-w-screen-xl lg:mx-auto">
        <VideoSection />
        <RoomCategories />
        <Advantages />
        <UserReviews />
        <News />
    </div>
</template>

<script>
import Hero from './Components/Hero';
import PromotionalBanner from './Components/PromotionalBanner';
import VideoSection from './Components/VideoSection';
import Advantages from './Components/Advantages';
import RoomCategories from './Components/RoomCategories';
import UserReviews from './Components/UserReviews';
import News from './Components/News';

    export default {
        name: 'landingPage',
        components: {
            Hero,
            PromotionalBanner,
            VideoSection,
            Advantages,
            RoomCategories,
            UserReviews,
            News
        }
    }
</script>

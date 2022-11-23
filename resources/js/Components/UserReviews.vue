<template>
    <div class="section__reviews">
        <h2 class="reviews__title">Voyez ce que disent nos clients</h2>
        <div class="reviews__cards" >
            <div v-for="review in reviews" :key="review.id">
                <UserReviewItem :review="review"/>
            </div>
        </div>
        <button class="section__reviews--CTA-SeeMore">Voir plus</button>

        <!-- START : Carousel -->
        <!--
        <div class="carousel w-full">
                <div id="slide1" class="carousel-item relative w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a>
                        <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a>
                        <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a>
                        <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full">
                    <img src="https://placeimg.com/800/200/arch" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a>
                        <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
            </div>
        -->
        <!-- STOP : Carousel -->
    </div>
</template>

<script>
import UserReviewItem from "./UserReviewItem";
export default {
    // name: "UserReview.vue",
    components: {
        UserReviewItem
    },
    data() {
        return {
            reviews: []
        }
    },
    // computed: {
    //     slideNumber() {
    //         return this.reviews.id + 1
    //     }
    // },
    async mounted() {
        const response = await axios.get('api/home/reviews');
        // this.reviews.push(...response.data);
        this.reviews.push(...response.data['data']);
    }
}
</script>

<style scoped>
.section__reviews {
    @apply flex flex-col mx-auto
}
.reviews__title {
    /*@apply;*/
}

.reviews__cards {
    @apply md:grid md:grid-cols-2 lg:grid lg:grid-cols-3 gap-4 mx-auto
    /*@apply flex flex-col lg:flex-row lg:flex-wrap lg:w-1/3 mx-auto*/
}

.section__reviews--CTA-SeeMore {
    @apply border-arth-yellow
}
</style>

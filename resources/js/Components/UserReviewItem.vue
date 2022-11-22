<template>
        <div class="review__card card">
            <div class="review__card--header">
                <figure>
                    <img src="https://placeimg.com/90/90/arch" alt="Shoes" />
<!--                    <img :src="review.customer_id.avatar" alt="customer_avatar" />-->
<!--                    <img :src="/storage/avatars/avatar1.png" alt="customer_avatar" />-->
                </figure>
                <div class="card__header--text">
                    {{ review.rating }}
                    <h2>Nom</h2>
                </div>
            </div>
            <div class="card-body">
                <h2 class="card-title">
                    {{ review.title }}
                </h2>
                <p>{{ review.created_at }}</p>
                <p>{{  review.body }}</p>
                <div class="card-actions justify-end">
<!--                    <p>{{ formatDate }}</p>-->

                    <div class="badge badge-secondary">NEW</div>
                    <div class="badge badge-outline">Products</div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            reviews: {}
        }
    },
    props:{
        review: {
            type: Object,
            default: () => {}
        }
    },
    computed: {
        formatDate() { // TODO - BUGFIX Ne fonctionne pas
            const date = this.review.created_at
            return date.toDateString()
        }
    },
    mounted() {
        console.log(this.review)
    }
}
</script>

<style scoped>
    .review__card {
        @apply w-10/12 h-max bg-base-100 shadow-xl m-10
    }

    .review__card--header {
        @apply flex justify-between pt-6 px-8
    }

    .card__header--text {
        @apply flex flex-col justify-items-center
    }

    .card__header--text>h2 {
        @apply my-0
    }
</style>

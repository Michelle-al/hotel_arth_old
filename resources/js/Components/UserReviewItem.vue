<template>
        <div class="review__card card">
            <div class="review__card--header">
                <figure>
                    <img :src="review.customer.avatar" class="card__header--img" alt="customer_avatar" />
                </figure>
                <div class="card__header--text">
                    {{ review.rating }}
                    <p>{{ review.customer.firstname}} {{review.customer
                        .lastname}}</p>
                </div>
            </div>
            <div class="card-body">
                <p class="card-title">
                    {{ review.title }}
                </p>
                <p>{{ formatDate }}</p>
                <p>{{  review.body }}</p>
                <div class="card-actions justify-end">
                    <div class="badge">Client vérifié</div>
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
            const date = new Date(this.review.created_at)
            return date.toLocaleDateString()
        }
    },
    mounted() {
        // console.log(this.review)
    }
}
</script>

<style scoped>
    .review__card {
        @apply w-11/12 h-max bg-base-100 shadow-xl mx-auto my-8 border border-arth-yellow
    }

    .review__card--header {
        @apply flex justify-between pt-6 px-8 space-x-10
    }

    .card__header--img{
        @apply h-4/5 w-auto
    }

    .card__header--text {
        @apply flex flex-col justify-items-center justify-evenly
    }

    .card__header--text>p {
        @apply my-0 text-xl
    }

    .card-body {
        @apply pt-0
    }

    .card-title {
        @apply text-2xl font-bold
    }

    .badge {
        @apply uppercase border border-arth-yellow bg-white text-black
    }
</style>

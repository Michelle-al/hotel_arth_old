<template>
    <div class="bg-arth-light-blue h-52 ">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8 ">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex w-0 flex-1 items-center">
                    <p class="ml-3 text-3xl">{{ promotionalBanner.text_french }}</p>
                </div>
                <div class="order-3 mt-2 w-full flex-shrink-0 sm:order-2 sm:mt-0 sm:w-auto">
                    <button class=" flex items-center justify-center bg-white px-4 py-2 border-arth-light-blue border-2">Réserver</button>
                </div>


                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex rounded-md p-2 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <XMarkIcon class="h-6 w-6 text-black" aria-hidden="true" />
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { XMarkIcon } from '@heroicons/vue/24/outline'
    export default {
        name: "PromotionalBanner.vue",
        components: {
            XMarkIcon
        },
        data() {
            return {
                promotionalBanner: {}
            }
        },
        async mounted() {
            const response = await axios.get('api/home/promotional_banner');
            this.promotionalBanner = {...response.data};

        }

    }

</script>

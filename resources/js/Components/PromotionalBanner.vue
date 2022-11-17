<template>
<!--    <div class="">-->
<!--        <div class="bg-arth-light-blue text-center font-tinos h-52 content-center">Coucou</div>-->
<!--        <div><ion-icon src="/path/to/external/file.svg"></ion-icon></div>-->
<!--    </div>-->
    <div class="bg-arth-light-blue h-52 text-center font-tinos text-black">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex w-0 flex-1 items-center">
          <span class="flex rounded-lg p-2">
            <MegaphoneIcon class="h-6 w-6 text-black" aria-hidden="true" />
          </span>
                    <p class="ml-3 truncate font-medium text-black">
                        <span>Bannière promo</span>
                    </p>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex rounded-md p-2 hover:bg-arth-green focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <XMarkIcon class="h-6 w-6 text-black" aria-hidden="true" />
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { MegaphoneIcon, XMarkIcon } from '@heroicons/vue/24/outline'
    export default {
        name: "PromotionalBanner.vue",
        data() {
            return {
                promotionalBanner: {}
            }
        },
        async mounted() {
            const response = await axios.get('api/home/Promotional_banner');
            this.promotionalBanner = {...response.data};
            console.log(this.promotionalBanner);
        }
    }

</script>

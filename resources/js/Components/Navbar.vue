<template>
    <Popover class="section__navbar absolute w-full bg-white" :class="isHomeView() ? 'absolute' : 'relative'">
        <div class="mx-auto max-w-8xl px-4 sm:px-6">
            <div
                class="flex items-center justify-between border-b-2 border-gray-100 py-2 lg:justify-start md:space-x-10 z-2">
                <div class="flex justify-start">
                    <a href="#">
                        <span class="sr-only">Hotel Arth</span>
                        <img class="h-20 w-auto" src="/storage/pictures/Logo.png" alt="Hotel Arth" />
                    </a>
                </div>
                <!-- START - Open button for small and medium devices -->
                <div class="-my-2 -mr-2 lg:hidden">
                    <PopoverButton
                        class="inline-flex items-center justify-center rounded-md bg-white mt-0 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-arth-dark-blue">
                        <span class="sr-only">Open menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <!-- STOP - Open button for small and medium devices -->

                <!-- START - Nav links for large devices -->
                <PopoverGroup as="nav" class="hidden space-x-6 lg:space-x-10 lg:flex items-center ml-0">
                    <a href="#rooms" class="font-medium text-gray-500 hover:text-gray-900">{{$t("navbar.rooms")}}</a>
                    <a href="#advantages" class="font-medium text-gray-500 hover:text-gray-900">{{ $t("navbar.advantages")}}</a>
                    <a href="#reviews" class="font-medium text-gray-500 hover:text-gray-900">{{ $t("navbar.reviews") }}</a>
                    <a href="#news" class="font-medium text-gray-500 hover:text-gray-900">{{  $t("navbar.news") }}</a>
                </PopoverGroup>
                <!-- STOP - Nav links for large devices -->

                <!-- START - CTA toogle languages and Reservation-->
                <div class="hidden items-center justify-end gap-10 md:gap-4 xl:gap-10 lg:flex lg:flex-1 lg:w-0">
                    <LanguagesToggleButton/>

<!--                    Login button-->
                    <router-link :to="{ name: 'login' }"
                        class="inline-flex items-center justify-center whitespace-nowrap border border-arth-dark-blue px-6 py-2 shadow-sm hover:bg-arth-dark-blue hover:text-white"
                    >{{ $t("buttons.connect")}}</router-link>

<!--                    Book button-->
                    <router-link :to="{ name: 'reservation' }">
                        <button class="inline-flex items-center justify-center whitespace-nowrap border
                        border-arth-dark-blue px-8 py-2 shadow-sm hover:bg-arth-dark-blue hover:text-white"
                        >
                            {{ $t("buttons.reservation") }}
                        </button>
                    </router-link>
                </div>
                <!-- END - CTA toogle languages and Reservation-->
            </div>
        </div>
        <!-- START - Display for small and medium devices -->
        <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition lg:hidden">
                <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="px-5 pt-5 pb-6">
                        <div class="flex items-center justify-between">
                            <router-link :to="{ name: 'landingPage' }">
                                <div>
                                    <img class="h-20 w-auto" src="/storage/pictures/Logo.svg" alt="Hôtel Arth" />
                                </div>
                            </router-link>

                            <div>
                                <LanguagesToggleButton />
                            </div>
                            <div class="-mr-2">
                                <PopoverButton
                                    class="inline-flex items-center justify-center rounded-md bg-white mt-0 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-arth-dark-blue">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                    </div>
                    <!-- START - Main Code for small devices -->
                    <div class="space-y-6 py-6 px-5">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            <a href="#rooms" class="font-medium text-gray-900 hover:text-gray-700">{{$t("navbar.rooms")
                                }}</a>
                            <a href="#advantages" class="font-medium text-gray-900 hover:text-gray-700">{{
                                    $t("navbar.advantages")}}</a>

                            <a href="#reviews" class="font-medium text-gray-900 hover:text-gray-700">{{
                                    $t("navbar.reviews") }}</a>
                            <a href="#news" class="font-medium text-gray-900 hover:text-gray-700">{{  $t("navbar.news")
                                }}</a>
                            <!-- STOP - Main Code for small devices -->
                        </div>
                        <div>
                            <router-link :to="{ name: 'reservation' }"
                                class="flex w-full items-center justify-center  border border-transparent bg-arth-dark-blue hover:bg-white hover:text-black hover:border-arth-dark-blue my-6 px-4 py-2 font-medium text-white shadow-sm hover:bg-arth-light-blue">
                                {{ $t("buttons.reservation")}}
                            </router-link>
                            <p class="mt-6 text-center font-medium text-gray-500">
                                {{ $t("navbar.alreadyHaveAccount") }}
                                {{ ' ' }}
                                <router-link :to="{ name: 'login' }">
                                    class="text-arth-dark-blue hover:font-bold">{{$t("buttons.connect")}}
                                </router-link>
                            </p>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
        <!-- STOP - Display for small and medium devices -->
    </Popover>
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    Bars3Icon,
    BookmarkSquareIcon,
    CalendarIcon,
    ChartBarIcon,
    CursorArrowRaysIcon,
    LifebuoyIcon,
    PhoneIcon,
    PlayIcon,
    ShieldCheckIcon,
    Squares2X2Icon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'

import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import LanguagesToggleButton from "./LanguagesToggleButton"

export default {
    name: "NavBar.vue",
    components: {
        LanguagesToggleButton,
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        Bars3Icon,
        BookmarkSquareIcon,
        CalendarIcon,
        ChartBarIcon,
        CursorArrowRaysIcon,
        LifebuoyIcon,
        PhoneIcon,
        PlayIcon,
        ShieldCheckIcon,
        Squares2X2Icon,
        XMarkIcon,
        ChevronDownIcon
    },
    data() {
        return {
            //
        }
    },
    mounted() {
    },
    computed: {
    },
    methods: {
        isHomeView() {
            return this.$router.currentRoute.value.name === 'landingPage';
        }
    }
}


</script>

<style scoped>
    .section__navbar{
    /*    */
    }
</style>

<template>
    <Popover class="section__navbar absolute w-full bg-white">
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
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Nos chambres</a>
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Nos avantages</a>
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Avis de nos
                        clients</a>
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Notre actualité</a>
                </PopoverGroup>
                <!-- STOP - Nav links for large devices -->

                <!-- START - CTA toogle languages and Reservation-->
                <div class="hidden items-center justify-end gap-10 md:gap-4 xl:gap-10 lg:flex lg:flex-1 lg:w-0">
                    <Languages />
                    <a href="#"
                        class="inline-flex items-center justify-center whitespace-nowrap border border-arth-dark-blue px-6 py-2 shadow-sm hover:bg-arth-dark-blue hover:text-white">Réserver</a>
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
                            <div>
                                <img class="h-20 w-auto" src="/storage/pictures/Logo.svg" alt="Hôtel Arth" />
                            </div>
                            <div><Popover class="relative" v-slot="{ open }">
                                <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500',
                        'group inline-flex items-center rounded-md bg-white mt-0  font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']">
                                    <span>Langues</span>
                                    <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                                </PopoverButton>

                                <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                                    <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-screen max-w-md -translate-x-1/2 transform px-2 sm:px-0">
                                        <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                                <a v-for="item in languages" :key="item.name" :href="item.href"
                                                    class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                                    <component :is="item.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600" aria-hidden="true" />
                                                    <div class="ml-4">
                                                        <p class="  font-medium text-gray-900">{{ item.name }}</p>
                                                        <p class="mt-1 text-sm text-gray-500">{{ item.description }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </Popover></div>
                            <div class="-mr-2">
                                <PopoverButton
                                    class="inline-flex items-center justify-center rounded-md bg-white mt-0 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                    </div>
                    <!-- Code for small devices -->
                    <div class="space-y-6 py-6 px-5">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">Nos chambres</a>
                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">Nos avantages</a>

                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">Avis de nos clients</a>
                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">Notre actualité</a>
<!--                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">Nous contacter</a>-->

                        </div>
                        <div>
                            <a href="#"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 my-6 px-4 py-2   font-medium text-white shadow-sm hover:bg-indigo-700">Réserver</a>
                            <p class="mt-6 text-center   font-medium text-gray-500">
                                J'ai déjà un compte ?
                                {{ ' ' }}
                                <a href="#" class="text-indigo-600 hover:text-indigo-500">Me connecter</a>
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
import Languages from "./Languages"

export default {
    name: "NavBar.vue",
    components: {
        Languages,
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
    methods: {
        //
    },
    mounted() {
        //
    }
}


</script>

<style scoped>
    .section__navbar{
    /*    */
    }
</style>

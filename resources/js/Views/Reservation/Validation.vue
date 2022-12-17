<template>
    <!--    navigation breadcrumb-->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'landingPage'}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    {{$t(('breadcrumb.home'))}}
                </router-link>
            </li>
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'reservation'}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    {{$t(('breadcrumb.reservation'))}}
                </router-link>
            </li>
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'option'}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    {{$t(('breadcrumb.options'))}}
                </router-link>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> {{$t(('breadcrumb.validation'))}}</span>
                </div>
            </li>
        </ol>
    </nav>

    <h1>{{$t(('breadcrumb.validation'))}}</h1>

    <form v-on:submit.prevent="userInfos">


    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {

            }
        }
    },
    methods: {



    }
}
</script>

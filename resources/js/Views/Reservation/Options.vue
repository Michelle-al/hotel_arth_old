<template>
    <!--    navigation breadcrumb-->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'landingPage'}"
                             class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Home
                </router-link>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path></svg>
                    <router-link :to="{name : 'reservation'}"
                                 class="ml-1 text-sm font-medium text-gray-500  hover:text-gray-900  dark:text-gray-400 dark:hover:text-white">
                        Reservation
                    </router-link>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path></svg>
                    <span
                        class="ml-1 text-sm font-medium md:ml-2 text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Options</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="options__section">
        <h1 class="option__heading">{{$t(('options.title'))}}</h1>

        <div class="option__heading--recap"> <!--TODO - Fake data, implement data from DB-->
            <p>{{ $t(('options.recapTitle'))}}</p>
            <p>{{ $t(('options.recapDate'))}}</p>
            <p>{{ $t(('options.recapRoom'))}}</p>
        </div>

        <p class="option__heading--help">{{$t(('options.help'))}}</p>

        <form v-on:submit.prevent="logInfos"
              class="form flex flex-col align-center mt-4">

            <div class="form-control flex flex-row flex-wrap mx-4 my-2">
                <input type="checkbox"
                       id="optionPetitDejeuner"
                       checked="checked"
                       class="checkbox checkbox-xs"
                       value="optionPetitDejeuner"
                       v-model="formOptions">
                <label for="optionPetitDejeuner" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionPetitDejeuner')}}</span>
                </label>
            </div>
            <div class="form-control flex flex-row mx-4 my-2">
                <input type="checkbox" id="optionMidi" class="checkbox checkbox-sm" value="optionMidi"
                       v-model="formOptions">
                <label for="optionMidi" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionMidi')}}</span>
                </label>
            </div>

            <div class="form-control flex flex-row mx-4 my-2">
                <input type="checkbox" id="optionSoir" class="checkbox checkbox-sm" value="optionSoir"
                       v-model="formOptions">
                <label for="optionSoir" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionSoir')}}</span>
                </label>
            </div>
            <div class="form-control flex flex-row mx-4 my-2">

                <input type="checkbox" id="optionMidiEtSoir" class="checkbox checkbox-sm" value="optionMidiEtSoir"
                       v-model="formOptions">
                <label for="optionMidiEtSoir" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionMidiEtSoir')}}</span>
                </label>
            </div>

            <div class="form-control flex flex-row mx-4 my-2">
                <input type="checkbox" id="optionPressing" class="checkbox checkbox-sm" value="optionPressing"
                       v-model="formOptions">
                <label for="optionPressing" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionPressing')}}</span>
                </label>

            </div>
            <div class="form-control flex flex-row mx-4 my-2">
                <input type="checkbox" id="optionCanalPlus" class="checkbox checkbox-sm" value="optionCanalPlus"
                       v-model="formOptions">
                <label for="optionCanalPlus" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionCanalPlus')}}</span>
                </label>

            </div>
            <div class="form-control flex flex-row mx-4 my-2">
                <input type="checkbox" id="optionSwimmingPool" class="checkbox checkbox-sm" value="optionSwimmingPool"
                       v-model="formOptions">
                <label for="optionSwimmingPool" class="label cursor-pointer ml-4">
                    <span class="label-text">{{ $t('options.optionSwimmingPool')}}</span>
                </label>
            </div>

            <p class="mt-6 text-center">{{ $t('options.totalAmount') }}
                <span class="font-bold">580</span> <!-- TODO - Fake data, implement data from DB -->
                <span> €</span>
            </p>

            <router-link :to="{ name: 'options' }" class="self-center">
                <button class="bg-arth-green mt-6 mb-8">{{ $t('options.button') }}</button>
            </router-link>
        </form>

    </div>

</template>

<script>
import reservation from "./Reservation.vue";
import options from "./Options.vue";

export default {
    name: "Options.vue",
    data() {
        return {
            formOptions: []
        }
    },
    methods: {
        options() {
            return options
        },
        reservation() {
            return reservation
        },
        logInfos() {
            console.log(this.form);
        }
    }
}
</script>

<style scoped>
    .options__section {
        @apply w-11/12 sm:w-96 md:w-3/6 lg:w-4/12 mx-auto
    }

    .option__heading {
        @apply mt-6
    }

    .option__heading--recap {
        @apply bg-arth-light-blue mx-auto mt-12 py-3 text-center
    }

    .option__heading--help {
        @apply mt-12 text-center font-montserrat
    }
</style>

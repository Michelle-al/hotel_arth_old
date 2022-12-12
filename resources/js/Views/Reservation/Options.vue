<template>
    <div>
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
                        <router-link :to="{name : 'reservation'}" class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                            Réservation
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
                        <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Options</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="option__heading">{{$t(('options.title'))}}</h1>

        <form v-on:submit.prevent="logInfos"
              class="form-control flex flex-col align-center w-96 md:w-3/6 lg:w-4/12 mx-auto mt-12">

            <div class="flex space mx-4">
                <input type="checkbox"
                       id="optionPetitDejeuner"
                       checked="checked"
                       class="checkbox"
                       name="optionPetitDejeuner"
                       v-model="form.optionPetitDejeuner">
                <label for="optionPetitDejeuner" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionPetitDejeuner')}}</span>
                </label>
            </div>
            <div class="flex mx-4">
                <input type="checkbox" id="optionMidi" class="checkbox" name="optionMidi" v-model="form.optionMidi">
                <label for="optionMidi" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionMidi')}}</span>
                </label>
            </div>

            <div class="flex mx-4">
                <input type="checkbox" id="optionSoir" class="checkbox" name="optionSoir" v-model="form.optionSoir">
                <label for="optionSoir" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionSoir')}}</span>
                </label>
            </div>
            <div class="flex mx-4">

                <input type="checkbox" id="optionMidiEtSoir" class="checkbox" name="optionMidiEtSoir"
                       v-model="form.optionSoir">
                <label for="optionMidiEtSoir" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionMidiEtSoir')}}</span>
                </label>
            </div>

            <div class="flex mx-4">
                <input type="checkbox" id="optionPressing" class="checkbox" name="optionPressing"
                       v-model="form.optionPressing">
                <label for="optionPressing" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionPressing')}}</span>
                </label>

            </div>
            <div class="flex mx-4">
                <input type="checkbox" id="optionCanalPlus" class="checkbox" name="optionCanalPlus"
                       v-model="form.optionCanalPlus">
                <label for="optionCanalPlus" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionCanalPlus')}}</span>
                </label>

            </div>
            <div class="flex mx-4">
                <input type="checkbox" id="optionSwimmingPool" class="checkbox" name="optionSwimmingPool"
                       v-model="form.optionSwimmingPool">
                <label for="optionSwimmingPool" class="label ml-4">
                    <span class="label-text">{{ $t('options.optionSwimmingPool')}}</span>
                </label>
            </div>

            <p class="mt-6 text-center">{{ $t('options.totalAmount') }}
                <span class="text-red-700">EXEMPLE 580</span>
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

export default {
    name: "Options.vue",
    data() {
        return {
            form: {
                optionPetitDejeuner:'',
                optionMidi:'',
                optionSoir:'',
                optionMidiEtSoir:'',
                optionPressing:'',
                optionCanalPlus:'',
                optionSwimmingPool:'',
            }
        }
    },
    methods: {
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
    .option__heading {
        @apply mt-6
    }

    .form-control {
        @apply border-2 border-red-700
    }
</style>

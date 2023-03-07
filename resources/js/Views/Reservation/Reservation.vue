<!--Les balises span sont celles de Daisy UI : NE PAS RETIRER LES BALISES SPAN : class CSS Daisy UI -->
<template>
    <!--    navigation breadcrumb-->
    <nav class="flex" aria-label="Breadcrumb" id="form-breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
<!--            <li class="inline-flex items-center ml-6">-->
<!--                <router-link :to="{ name: 'landingPage'}"-->
<!--                             class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">-->
<!--                    {{ $t(('breadcrumb.home')) }}-->
<!--                </router-link>-->
<!--            </li>-->
<!--            <li> > </li>-->
            <li class="inline-flex items-center ml-6">
                <button  @click="setActiveTab('checkAvailability')"
                         :class="{ active: activeTab === 'checkAvailability' }"
                         id="nav--button"
                >
                    {{ $t(('breadcrumb.reservation')) }}
                </button>
            </li>
            <li> > </li>
            <li class="inline-flex items-center ml-6">
                <button  @click="setActiveTab('selectOption')"
                         :class="{ active: activeTab === 'selectOption' } "
                         id="nav--button"
                >
                    {{ $t(('breadcrumb.options')) }}
                </button>
            </li>
            <li> > </li>
            <li class="inline-flex items-center ml-6">
                <button  @click="setActiveTab('validation')"
                         :class="{ active: activeTab === 'validation' } "
                         id="nav--button"
                         >
                    {{ $t(('breadcrumb.validation')) }}
                </button>
            </li>
        </ol>
    </nav>



    <form v-on:submit.prevent="logInfos, submitBooking"  ref="reservationForm">
        <div class="form-control w-full max-w-md mx-auto my-12">
            <!-- START - Vue Reservation -->
            <fieldset class="checkAvailability__section" id="checkAvailability" v-show="activeTab === 'checkAvailability'">
                <h1 class="reservation__heading">{{ $t(('reservation.title')) }}</h1>
                <div class="form-group flex justify-between gap-x-1">
                    <div class="flex-col ">
                        <label for="checkin" class="label">
                            <span class="label-text">{{ $t('reservation.arrival') }}</span>
                        </label>
                        <input type="Date" id="checkin" name="checkin" v-model="form.checkin">
                    </div>
                    <div class="flex-col">
                        <label for="checkout" class="label">
                            <span class="label-text">{{ $t('reservation.departure') }}</span>
                        </label>
                        <input type="Date" id="checkout" name="checkout" v-model="form.checkout">
                    </div>
                </div>

                <label for="roomCategory-select" class="label">
                    <span class="label-text">{{ $t('reservation.roomCategory') }}</span>
                </label>
<!--                TODO - Récupérer la valeur de form.roomCategory pour la récap-->
                <select class="select select-bordered rounded-none" id="roomCategory-select" name="roomCategory"
                        v-model="form.roomCategory">
                    <option disabled selected>{{ $t('reservation.selectInputHelp') }}</option>
                    <option value="{{ $t('reservation.roomClassic') }}">{{ $t('reservation.roomClassic') }}</option>
                    <option value="{{ $t('reservation.roomRoyale') }}">{{ $t('reservation.roomRoyale') }}</option>
                    <option value="{{ $t('reservation.roomLuxury') }}">{{ $t('reservation.roomLuxury') }}</option>
                </select>

                <label for="numberOfRooms" class="label">
                    <span class="label-text">{{ $t('reservation.numberOfRooms') }}</span>
                </label>
                <input type="number" id="numberOfRooms" name="numberOfRooms" v-model="form.numberOfRooms">

                <label for="numberOfPeople" class="label">
                    <span class="label-text">{{ $t('reservation.numberOfPeople') }}</span>
                </label>
                <input type="number" id="numberOfPeople" name="numberOfPeople" v-model="form.numberOfPeople">

<!--                TODO - Mettre le texte issu de la bdd ? du fichier de traduction ?-->
                <p class="mt-6 text-center text-red-600">Résultat de l'algo de dispo</p>
                <p class="text-center text-red-600">Prix provisoire</p>

<!--                <router-link :to="{ name: 'options' }" class="self-center">-->
                    <button type="button" @click="nextTab()" class="bg-arth-green w-full mt-6 mb-8">{{ $t('reservation.button') }}</button>
<!--                </router-link>-->
            </fieldset>
            <!-- END - Vue Reservation -->

            <!-- START - Vue Options -->
            <fieldset class="options__section" id="selectOption" v-show="activeTab === 'selectOption'" :disabled="activeTab === 'checkAvailability'">
                <h1 class="option__heading">{{$t(('options.title'))}}</h1>

                <div class="option__heading--recap"> <!--TODO - Fake data, for text implement data from DB-->
                    <p>{{ $t(('options.recapTitle'))}} <br>
                        {{ $t(('options.recapStartDate')) }} {{ form.checkin }} {{ $t(('options.recapEndDate')) }} {{ form.checkout}} <br>
                    {{ form.numberOfRooms }} {{ $t(('options.recapRoom'))}} {{ form.roomCategory }}, {{ form.numberOfPeople }} {{ $t(('options.recapPeople'))}}
                    </p>
                </div>

                <p class="option__heading--help">{{$t(('options.help'))}}</p>

                <div class="form-control flex flex-row flex-wrap mx-4 my-2">
                    <input type="checkbox"
                           id="optionPetitDejeuner"
                           checked="checked"
                           class="checkbox checkbox-xs"
                           value="optionPetitDejeuner"
                           v-model="form.formOptions">
                    <label for="optionPetitDejeuner" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionPetitDejeuner')}}</span>
                    </label>
                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionMidi" class="checkbox checkbox-sm" value="optionMidi"
                           v-model="form.formOptions">
                    <label for="optionMidi" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionMidi')}}</span>
                    </label>
                </div>

                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionSoir" class="checkbox checkbox-sm" value="optionSoir"
                           v-model="form.formOptions">
                    <label for="optionSoir" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionSoir')}}</span>
                    </label>
                </div>
                <div class="form-control flex flex-row mx-4 my-2">

                    <input type="checkbox" id="optionMidiEtSoir" class="checkbox checkbox-sm" value="optionMidiEtSoir"
                           v-model="form.formOptions">
                    <label for="optionMidiEtSoir" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionMidiEtSoir')}}</span>
                    </label>
                </div>

                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionPressing" class="checkbox checkbox-sm" value="optionPressing"
                           v-model="form.formOptions">
                    <label for="optionPressing" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionPressing')}}</span>
                    </label>

                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionCanalPlus" class="checkbox checkbox-sm" value="optionCanalPlus"
                           v-model="form.formOptions">
                    <label for="optionCanalPlus" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionCanalPlus')}}</span>
                    </label>

                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionSwimmingPool" class="checkbox checkbox-sm" value="optionSwimmingPool"
                           v-model="form.formOptions">
                    <label for="optionSwimmingPool" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionSwimmingPool')}}</span>
                    </label>
                </div>

                <p class="mt-6 text-center">{{ $t('options.totalAmount') }}
                    <span class="font-bold">580</span> <!-- TODO - Fake data, implement data from DB -->
                    <span> €</span>
                </p>

<!--                <router-link :to="{ name: 'options' }" class="self-center">-->
                    <button type="button" @click="nextTab()" class="bg-arth-green w-full mt-6 mb-8">{{ $t('options.button') }}</button>
<!--                </router-link>-->
            </fieldset>
            <!-- END - Vue Options -->
<!--            START - Vue Validation -->
            <fieldset class="validation__section" id="validateBooking" v-show="activeTab === 'validateBooking'" :disabled="activeTab !== 'validateBooking'">
                <h1 class="validation__heading">{{ $t(('breadcrumb.validation')) }}</h1>
                <button v-on:submit="logInfos" type="submit" id="submit" class="submit"></button>
            </fieldset>
<!--            END - Vue Validation-->
        </div>
        <!-- SUBMIT BUTTON -->

    </form>

    <div class="alert" v-if="errors.length">
        <div v-for="error in errors" :key="error.index">{{ error }}</div>
    </div>
</template>

<script>
//import router from "@/router";


export default {
    data() {
        return {
            form: {
                checkin: ('').toLocaleString(),
                checkout: '',
                roomCategory: '',
                numberOfRooms: 1,
                numberOfPeople: 1,
                formOptions: [],
            },
            allTabs: ["checkAvailability","selectOption","validation"],
            activeTab: "checkAvailability",
            errors: [],
        }
    },
    methods: {
        logInfos() {
            console.log(this.form);
        },
        setActiveTab(tabRef) {
            if (this.$refs.reservationForm.reportValidity()) {
                this.activeTab = tabRef;
            }
        },
        nextTab() {
            if (
                this.activeTab !== "validation" &&
                this.$refs.reservationForm.reportValidity()
            ) {
                this.activeTab = this.allTabs[this.allTabs.indexOf(this.activeTab) + 1];
            }
        },
        prevTab() {
            if (this.activeTab !== "checkAvailability") {
                this.activeTab = this.allTabs[this.allTabs.indexOf(this.activeTab) - 1];
            }
        },
        resetForm() {
            this.$refs.reservationForm.reset();
        },
        async submitBooking() {
            if (this.$refs.reservationForm.reportValidity()) {
                const config = {
                    headers: {
                        Accept: ["application/json"],
                        "Content-Type": ["application/json"],
                    },
                }
            }
        }
    }
}
</script>

<style scoped>

.alert {
    padding: 1rem;
    color: #df271c;
    font-size: 14px;
    text-align: center;
    border: 1px solid #df271c;
    white-space: pre-line;
    margin: 0 2rem;
}

.form-breadcrumb {

}

fieldset {
    @apply mx-auto;
}

.select {
    @apply m-0 w-full;
}

#nav--button {
    border: none;
    @apply pl-2 pr-2
}

.reservation__heading,
.option__heading,
.validation__heading {
    @apply mb-8
}

.option__heading--recap {
    @apply bg-arth-light-blue mx-auto mt-12 py-3 text-center
}

.option__heading--help {
    @apply mt-12 mb-6 text-center font-montserrat
}
</style>


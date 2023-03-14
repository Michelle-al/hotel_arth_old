<!--Les balises span sont celles de Daisy UI : NE PAS RETIRER LES BALISES SPAN : class CSS Daisy UI -->
<template>
    <!--    navigation breadcrumb-->
    <nav class="flex" aria-label="Breadcrumb" id="form-breadcrumb">
        <ul class="inline-flex items-center space-x-1 md:space-x-3">
            <!--            <li class="inline-flex items-center ml-6">-->
            <!--                <router-link :to="{ name: 'landingPage'}"-->
            <!--                             class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">-->
            <!--                    {{ $t(('breadcrumb.home')) }}-->
            <!--                </router-link>-->
            <!--            </li>-->
            <!--            <li> > </li>-->
            <li class="inline-flex items-center ml-6">
                <button @click="setActiveTab('checkAvailability')"
                        :class="{ active: activeTab === 'checkAvailability' }"
                        id="nav--button"
                >
                    {{ $t(('breadcrumb.reservation')) }}
                </button>
            </li>
            <li> ></li>
            <li class="inline-flex items-center ml-6">
                <button @click="setActiveTab('selectOption')"
                        :class="{ active: activeTab === 'selectOption' } "
                        id="nav--button"
                >
                    {{ $t(('breadcrumb.options')) }}
                </button>
            </li>
            <li> ></li>
            <li class="inline-flex items-center ml-6">
                <button @click="setActiveTab('validateBooking')"
                        :class="{ active: activeTab === 'validateBooking' } "
                        id="nav--button"
                >
                    {{ $t(('breadcrumb.validation')) }}
                </button>
            </li>
        </ul>
    </nav>

    <form ref="reservationForm"  @submit.prevent="submitBooking" class="flex flex-col mx-4">
        <div class="form-control w-full max-w-md mx-auto my-12">
            <!-- START - Vue Reservation -->
            <fieldset class="checkAvailability__section" id="checkAvailability"
                      v-show="activeTab === 'checkAvailability'">
                <legend>
                    <h1 class="reservation__heading">{{ $t(('reservation.title')) }}</h1>
                </legend>
                <div class="form-group flex justify-between gap-x-1">
                    <div class="flex-col ">
                        <label for="checkin" class="label">
                            <span class="label-text">{{ $t('reservation.arrival') }}</span>
                        </label>
                        <!--                        TODO - Bloquer la sélection de dates antérieures à la date du jour-->
                        <VueDatePicker
                            v-model="form.reservation.checkin"
                            uid="checkin"

                            close-on-scroll
                            auto-apply placeholder="Select Date"
                            required prevent-min-max-navigation
                            :locale="store.getLocale"
                            :format="formateDate"
                            :format-locale="fr"
                            :min-date="new Date()"
                            :max-date="maxDate"

                            id="checkin" name="checkin"  ></VueDatePicker>
                    </div>
                    <div class="flex-col">
                        <label for="checkout" class="label">
                            <span class="label-text">{{ $t('reservation.departure') }}</span>
                        </label>
                        <!--                        TODO - Bloquer la sélection de dates antérieures à la date de check in-->
                        <VueDatePicker
                            v-model="form.reservation.checkout"
                            uid="checkout"

                            close-on-scroll
                            auto-apply placeholder="Select Date"
                            required prevent-min-max-navigation
                            :locale="store.getLocale"
                            :format="formateDate"
                            :format-locale="fr"
                            :min-date="calculateMinCheckoutDate"
                            :max-date="maxDate"

                                       id="checkout" name="checkout" ></VueDatePicker>
                    </div>
                </div>

                <label for="roomCategory-select" class="label">
                    <span class="label-text">{{ $t('reservation.roomCategory') }}</span>
                </label>
                <!--                TODO - Récupérer la valeur de form.roomCategory pour la récap-->
                <select class="select select-bordered rounded-none" id="roomCategory-select" name="roomCategory"
                        v-model="form.reservation.roomCategory">
                    <option disabled selected>{{ $t('reservation.selectInputHelp') }}</option>
                    <option value="classic">{{ $t('reservation.classic') }}</option>
                    <option value="luxury">{{ $t('reservation.luxury') }}</option>
                    <option value="royal">{{ $t('reservation.royal') }}</option>
                </select>
<!--                <div v-if="form.roomCategory === 'classic'">-->
                    <img v-if="form.reservation.roomCategory === 'classic'" :src="roomsImg.classic.src" :alt="roomsImg.classic.altFr">
                    <img v-else-if="form.reservation.roomCategory === 'luxury'" :src="roomsImg.luxury.src" :alt="roomsImg.classic.altFr">
                    <img v-else-if="form.reservation.roomCategory === 'royal'" :src="roomsImg.royal.src" :alt="roomsImg.classic.altFr">
<!--                </div>-->

                <label for="numberOfPeople" class="label">
                    <span class="label-text">{{ $t('reservation.numberOfPeople') }}</span>
                </label>
                <input type="number" id="numberOfPeople" name="numberOfPeople" min="1" max="10"
                       v-model="form.reservation.numberOfPeople" class="w-full max-w-md">

                <label for="numberOfRooms" class="label">
                    <span class="label-text">{{ $t('reservation.numberOfRooms') }}</span>
                </label>
                <input type="number" id="numberOfRooms" name="numberOfRooms"
                       @change="calculateMinNumberOfRoomsDependingOfNumberOfPeople"
                       :min="calculateMinNumberOfRoomsDependingOfNumberOfPeople"
                       max="10"
                       required class="w-full max-w-md"
                       v-model="form.reservation.numberOfRooms">
                <!--                TODO - Mettre le texte issu de la bdd ? du fichier de traduction ?-->
                <p class="mt-6 text-center text-red-600 font-bold">Résultat de l'algo de dispo</p>
                <p class="text-center text-red-600 font-bold">Prix provisoire</p>

                <button type="button" @click="nextTab()" class="">
                    {{ $t('buttons.buttonBooking') }}
                </button>
            </fieldset>
            <!-- END - Vue Reservation -->

            <!-- START - Vue Options -->
            <fieldset class="options__section" id="selectOption" v-show="activeTab === 'selectOption'"
                      :disabled="activeTab === 'checkAvailability'">
                <legend>
                    <h1 class="option__heading">{{ $t(('options.title')) }}</h1>
                </legend>

                <div class="option__heading--recap"> <!--TODO - Fake data, for text implement data from DB-->
                    <p>{{ $t(('options.recapTitle')) }} <br>
                        {{ $t(('options.recapStartDate')) }}
                        {{ form.reservation.checkin }}
                        {{ $t(('options.recapEndDate')) }}
                        {{ form.reservation.checkout }} <br>
                        {{ form.reservation.numberOfRooms }} {{ $t(('options.recapRoom')) }}
<!--TODO - Bugfix Not found 'reservation.' key in 'en' locale messages.-->
                        {{ $t((`reservation.${form.reservation.roomCategory}`))}},

                        {{ form.reservation.numberOfPeople }} {{ $t(('options.recapPeople')) }}
                    </p>
                </div>

                <p class="option__heading--help">{{ $t(('options.help')) }}</p>

                <div class="form-control flex flex-row flex-wrap mx-4 my-2">
                    <input type="checkbox"
                           id="optionPetitDejeuner"
                           name="optionPetitDejeuner"
                           checked="checked"
                           class="checkbox checkbox-xs"
                           value="1"
                           v-model="form.reservation.formOptions">
                    <label for="optionPetitDejeuner" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionPetitDejeuner') }}</span>
                    </label>
                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionMidi" name="optionMidi" class="checkbox checkbox-sm"
                           value="2"
                           v-model="form.reservation.formOptions">
                    <label for="optionMidi" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionMidi') }}</span>
                    </label>
                </div>

                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionSoir" name="optionSoir" class="checkbox checkbox-sm"
                           value="3"
                           v-model="form.reservation.formOptions">
                    <label for="optionSoir" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionSoir') }}</span>
                    </label>
                </div>
                <div class="form-control flex flex-row mx-4 my-2">

                    <input type="checkbox" id="optionMidiEtSoir" name="optionMidiEtSoir" class="checkbox checkbox-sm"
                           value="4"
                           v-model="form.reservation.formOptions">
                    <label for="optionMidiEtSoir" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionMidiEtSoir') }}</span>
                    </label>
                </div>

                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionPressing" name="optionPressing" class="checkbox checkbox-sm"
                           value="5"
                           v-model="form.reservation.formOptions">
                    <label for="optionPressing" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionPressing') }}</span>
                    </label>

                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionCanalPlus" name="optionCanalPlus" class="checkbox checkbox-sm"
                           value="6"
                           v-model="form.reservation.formOptions">
                    <label for="optionCanalPlus" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionCanalPlus') }}</span>
                    </label>

                </div>
                <div class="form-control flex flex-row mx-4 my-2">
                    <input type="checkbox" id="optionSwimmingPool" name="optionSwimmingPool"
                           class="checkbox checkbox-sm"
                           value="7"
                           v-model="form.reservation.formOptions">
                    <label for="optionSwimmingPool" class="label cursor-pointer ml-4">
                        <span class="label-text">{{ $t('options.optionSwimmingPool') }}</span>
                    </label>user.
                </div>

                <p class="mt-6 text-center text-red-600 font-bold">{{ $t('options.totalAmount') }}
                    <span>580</span> <!-- TODO - Fake data, implement data from DB -->
                    <span> €</span>
                </p>

                <button type="button" @click="nextTab()" class="bg-arth-green w-full mt-6 mb-8">
                    {{ $t('buttons.buttonOptions') }}
                </button>

            </fieldset>
            <!-- END - Vue Options -->

            <!--            START - Vue Validation -->
            <fieldset class="validation__section" id="validateBooking" v-show="activeTab === 'validateBooking'"
                      :disabled="activeTab !== 'validateBooking'">
                <legend>
                    <h1 class="validation__heading">{{ $t(('breadcrumb.validation')) }}</h1>
                </legend>

                <h2>{{ $t('validation.customerInformationsTitle') }}</h2>
                <div class="form-group flex justify-start gap-x-1">
                    <div class="form-control">
                        <label for="madam" class="label cursor-pointer">
                            <input type="radio" name="civility" id="madam" class="radio radio-xs"
                                   v-model="form.user.civility"/>
                            <span class="label-text ml-2 mr-4">{{ $t('validation.madam') }}</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label for="mister" class="label cursor-pointer">
                            <input type="radio" name="civility" id="mister" class="radio radio-xs"
                                   v-model="form.user.civility"/>
                            <span class="label-text ml-2">{{ $t('validation.mister') }}</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="form-control w-full">
                        <label for="lastname" class="label">
                            <span class="label-text">{{ $t('validation.lastname') }}</span>
                        </label>
                        <input type="text" id="lastname" name="lastname" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.lastname"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="firstname" class="label">
                            <span class="label-text">{{ $t('validation.firstname') }}</span>
                        </label>
                        <input type="text" id="firstname" name="firstname" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.firstname"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="email" class="label">
                            <span class="label-text">{{ $t('validation.email') }}</span>
                        </label>
                        <input type="email" id="email" name="email" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.email"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="phoneNumber" class="label">
                            <span class="label-text">{{ $t('validation.phoneNumber') }}</span>
                        </label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder=""
                               class="input input-bordered w-full max-w-md"
                               v-model="form.user.phoneNumber"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="address" class="label">
                            <span class="label-text">{{ $t('validation.address') }}</span>
                        </label>
                        <input type="text" id="address" name="address" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.address"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="zipCode" class="label">
                            <span class="label-text">{{ $t('validation.zipCode') }}</span>
                        </label>
                        <input type="text" id="zipCode" name="zipCode" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.zipCode"/>
                    </div>

                    <div class="form-control w-full">
                        <label for="city" class="label">
                            <span class="label-text">{{ $t('validation.city') }}</span>
                        </label>
                        <input type="text" id="city" name="city" placeholder=""
                               class="input input-bordered w-full max-w-md" v-model="form.user.city"/>
                    </div>
                </div>

                <div class=" flex flex-col">
                    <div class="form-control">
                        <label for="isTravelForWork" class="label cursor-pointer">
                            <span class="label-text">{{ $t('validation.isTravelForWork') }}</span>
                            <input type="checkbox" id="isTravelForWork" name="isTravelForWork" class="checkbox"
                                   v-model="form.reservation.isTravelForWork"
                                   />
                        </label>
                    </div>

                    <div v-if="form.reservation.isTravelForWork === true">
                        <h2>{{ $t('validation.companyInformationsTitle') }}</h2>
                        <div class="form-control w-full">
                            <label for="companyName" class="label">
                                <span class="label-text">{{ $t('validation.companyName') }}</span>
                            </label>
                            <input type="text" id="companyName" name="companyName" placeholder=""
                                   class="input input-bordered w-full max-w-md"
                                   v-model="form.user.companyName"/>
                        </div>
                        <div class="form-control w-full">
                            <label for="companyAddress" class="label">
                                <span class="label-text">{{ $t('validation.companyAddress') }}</span>
                            </label>
                            <input type="text" id="companyAddress" name="companyAddress" placeholder=""
                                   class="input input-bordered w-full max-w-md"
                                   v-model="form.user.companyName"/>
                        </div>

                        <div class="form-control w-full">
                            <label for="companyZipCode" class="label">
                                <span class="label-text">{{ $t('validation.companyZipCode') }}</span>
                            </label>
                            <input type="text" id="companyZipCode" name="companyZipCode" placeholder=""
                                   class="input input-bordered w-full max-w-md" v-model="form.user.zipCode"/>
                        </div>

                        <div class="form-control w-full">
                            <label for="companyCity" class="label">
                                <span class="label-text">{{ $t('validation.companyCity') }}</span>
                            </label>
                            <input type="text" id="companyCity" name="companyCity" placeholder=""
                                   class="input input-bordered w-full max-w-md" v-model="form.user.city"/>
                        </div>
                    </div>


                    <div>
                        <h2>{{ $t('validation.recapTitle') }}</h2>

                        <div class="booking__validation--recap"><!--TODO - Fake data, for text implement data from DB-->
                            <p class="m-2">{{ $t(('options.recapTitle')) }} <br>
                                {{ $t(('options.recapStartDate')) }} {{ form.reservation.checkin }} {{
                                    $t(('options.recapEndDate'))
                                }} {{ form.reservation.checkout }} <br>
                                {{ form.reservation.numberOfRooms }} {{ $t(('options.recapRoom')) }}  {{ $t((`reservation.${form.reservation.roomCategory}`))}},
                                {{ form.reservation.numberOfPeople }} {{ $t(('options.recapPeople')) }}
                            </p>
                            <p class="m-2">Options : </p>
                            <ul class="m-2">
                                <li v-for="(option,i) in form.reservation.formOptions">{{ option }}</li>
                            </ul>
                            <p class="mx-6 my-6 text-start">{{ $t('validation.annulationDelay') }}</p>
                        </div>
                    </div>
                </div>

                <button @click="submitBooking" type="button" id="submit" class="submit">
                    {{ $t('buttons.buttonValidateAndGoToPayment') }}
                </button>
            </fieldset>
            <!--            END - Vue Validation-->
        </div>
    </form>

    <div class="alert" v-if="errors.length">
        <div v-for="error in errors" :key="error.index">{{ error }}</div>
    </div>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import {useGlobalStore} from "../../../stores/globalStore";
import {enGB, fr} from 'date-fns/locale';
import moment from "moment";
import {computed} from "vue";
import {addMonths, getMonth, getYear} from 'date-fns';


export default {
    name: 'reservation',
    components: { VueDatePicker },
    setup() {
        const store = useGlobalStore();
        const maxDate = computed(() => addMonths(new Date(getYear(new Date()), getMonth(new Date())), 6));
        return {store, fr, enGB, maxDate};
    },
    data() {
        return {
            form: {
                reservation : {
                    checkin: null,
                    checkout: null,
                    roomCategory: '',
                    numberOfRooms: null,
                    numberOfPeople: null,
                    formOptions: [],
                    isTravelForWork: false ? "personal" : "pro"
                },
                user : {
                    civility: "",
                    firstname: "",
                    lastname: "",
                    email: "",
                    phoneNumber: "",
                    address: "",
                    zipCode: "",
                    city: "",
                    companyName: null,
                    companyAddress: null,
                    companyZipCode: null,
                    companyCity: null
                }
            },
            roomsImg: {
                classic: {
                    src: "storage/room_categories/arth_chambre_classique.jpeg",
                    altFr: "Chambre Classique",
                    altEn: " Classic Room",
                },
                luxury: {
                    src: "storage/room_categories/arth_chambre_luxe.jpeg",
                    altFr: "Chambre de luxe",
                    altEn: " Luxury  Room",
                },
                royal: {
                    src: "storage/room_categories/hotel-room-g512f9f1ee_1920.jpg",
                    altFr: "Suite Royale",
                    altEn: "Royal Suite",
                }
            },
            allTabs: ["checkAvailability", "selectOption", "validateBooking"],
            activeTab: "checkAvailability",
            errors: [],
        }
    },
    computed: {
        calculateMinNumberOfRoomsDependingOfNumberOfPeople() {
            const numberOfPeople = this.form.reservation.numberOfPeople;
            let minNumberOfRooms = 1;
            let numberOfBeds = minNumberOfRooms * 3;

            if (numberOfPeople > (numberOfBeds)) {
                return minNumberOfRooms = Math.ceil(numberOfPeople/3);
            } else {
                return minNumberOfRooms;
            }
        },
        calculateMinCheckoutDate() {
            if (this.form.reservation.checkin) {
                const checkinDate = new Date(moment(this.form.reservation.checkin, "DD MM YYYY"));
                return new Date(moment(checkinDate).add(1, 'days'));
            }
        },
        formateDate() {
            return this.store.getLocale === 'fr' ? 'dd/MM/yyyy' : 'MM/dd/yyyy'
        },
    },
    methods: {
        useGlobalStore,
        setActiveTab(tabRef) {
            if (this.$refs.reservationForm.reportValidity()) {
                this.activeTab = tabRef;
            }
        },
        nextTab() {
            if (
                this.activeTab !== "validateBooking" &&
                this.$refs.reservationForm.reportValidity()
            ) {
                this.activeTab = this.allTabs[this.allTabs.indexOf(this.activeTab) + 1];
            }
        },
        /*prevTab() {
            if (this.activeTab !== "checkAvailability") {
                this.activeTab = this.allTabs[this.allTabs.indexOf(this.activeTab) - 1];
            }
        },*/
        resetForm() {
            this.$refs.reservationForm.reset();
        },
        async submitBooking() {
            console.log(this.form);
            this.resetForm();
            /*if (this.$refs.reservationForm.reportValidity()) {
                const config = {
                    headers: {
                        Accept: ["application/json"],
                        "Content-Type": ["application/json"],
                        //withCredentials: true,
                    },
                    auth: {
                        // TODO - Ajouter le cookie utilisateur;
                    },
                };
            await axios
                .post(
                    "",
                    {
                        config,
                        // TODO - Add form data
                    },
                    {

                    }
                )
                .then(
                    (response) => {
                            if (response.status === 200 || response.status === 201) {
                                console.log(this.form);
                                console.debug("response code: " + response.status);
                                this.resetForm();
                                return router.push("/reservation-confirmation");
                            } else {
                                this.errors.push(
                                    "Une erreur s'est produite lors de l'enregistrement de votre réservation : " +
                                    (response?.data?.message || "inconnue")
                                );
                            }
                        },
                )
                .catch((error) => {
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        // The request was made but no response was received
                        // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                        // http.ClientRequest in node.js
                        console.log(error.request);
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                    this.errors.push(
                            "Une erreur s'est produite lors de l'enregistrement de votre réservation." +
                        (error?.response?.data?.message || "inconnue")
                    );
                });
            }*/
        },
    },
    mounted() {
        //
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

legend {
    @apply w-full;
}

form button {
    @apply bg-arth-green w-full mt-6 mb-8;
}

form input {
    @apply rounded-sm;
}

fieldset {
    @apply mx-0;
}

label {
    @apply mt-4;
}

.validation__section {
//margin: 0;
}

.select {
    @apply m-0 w-full;
}

#nav--button {
    border: none;

    @apply pl-2 pr-2 font-normal border-0;
}

.active {
    @apply font-bold !important;
}

.reservation__heading,
.option__heading,
.validation__heading {
    @apply mb-8
}

.option__heading--recap,
.booking__validation--recap {
    @apply bg-arth-light-blue mx-auto mt-12 py-3 px-4 text-center
}

.option__heading--help {
    @apply mt-12 mb-6 text-center font-montserrat
}

.option__heading--recap {
    @apply px-4
}

.options__section label {
    @apply mt-0;
}
</style>


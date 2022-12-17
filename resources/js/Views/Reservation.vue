<template>
    <!--    navigation breadcrumb-->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center ml-6">
                <router-link :to="{ name: 'landingPage'}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Home
                </router-link>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Reservation</span>
                </div>
            </li>
        </ol>
    </nav>

    <h1>{{$t(('reservation.title'))}}</h1>

    <form v-on:submit.prevent="logInfos">
        <div class="form-control w-full max-w-xs mx-auto mt-12">
            <div class="flex">
                <div class="flex-col mr-4 lg:mr-6">
                    <label for="checkin" class="label">
                        <span class="label-text">{{ $t('reservation.arrival')}}</span>
                    </label>
                    <input type="Date" id="checkin" name="checkin" v-model="form.checkin">
                </div>
                <div class="flex-col">
                    <label for="checkout" class="label">
                        <span class="label-text">{{ $t('reservation.departure')}}</span>
                    </label>
                    <input type="Date" id="checkout" name="checkout" v-model="form.checkout">
                </div>
            </div>

            <label for="roomCategory-select" class="label">
                <span class="label-text">{{ $t('reservation.roomCategory')}}</span>
            </label>
            <select class="select select-bordered rounded-none" id="roomCategory-select" name="roomCategory" v-model="form.room_category">
                <option disabled selected>Select an option</option>
                <option value="classic">La classique</option>
                <option value="luxury">La chambre de luxe</option>
                <option value="royale">La Suite Royale</option>
            </select>


            <label for="numberOfRooms" class="label">
                <span class="label-text">{{ $t('reservation.numberOfRooms')}}</span>
            </label>
            <input type="number" id="numberOfRooms" name="numberOfRooms" v-model="form.number_of_rooms">

            <label for="numberOfPeople" class="label">
                <span class="label-text">{{ $t('reservation.numberOfPeople')}}</span>
            </label>
            <input type="number" id="numberOfPeople" name="numberOfPeople" v-model="form.number_of_people">

            <p class="mt-6">Résultat de l'algo de dispo</p>
            <p>Prix provisoire</p>

            <button class="bg-arth-green mt-6">{{ $t('reservation.button') }}</button>
        </div>


    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    checkin: '',
                    checkout: '',
                    room_category: '',
                    number_of_rooms: 1,
                    number_of_people: 1
                }
            }
        },
        methods: {
            // logInfos() {
            //     console.log(this.form)
            // }
            //     async logInfos(){
            //         console.log(`form ${this.form.checkin} `)
            //         const response = await axios.post('api/reservations/availability',
            //            this.form
            //         )
            //         console.log(response.data);
            //
            //     }
        }
    }
</script>

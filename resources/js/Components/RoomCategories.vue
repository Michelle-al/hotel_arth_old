<template>
    <div class="md:mt-20 flex flex-col lg:bg-arth-dark-blue flex-items-center">
        <h1 class="p-12 lg:text-white font-semibold uppercase">Nos chambres</h1>
         <div v-for="category in roomCategories" :key="category.id">
             <Room :room="category"/>
         </div>
        <div class="p-12 flex">
            <button class="mt-0">Réserver</button>
        </div>
    </div>
</template>

<script>
import Room from './Room';

    export default {
        components: {Room},
        data() {
            return {
                roomCategories: []
            }
        },
        async mounted() {
            const response = await axios.get('/api/home/room_category');
            this.roomCategories.push(...response.data);
        }
    }
</script>

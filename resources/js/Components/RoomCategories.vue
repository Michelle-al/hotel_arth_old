<template>
    <div class="flex flex-col lg:bg-arth-dark-blue flex-items-center">
        <h1 class="p-12 text-white font-semibold">Nos chambres</h1>
         <div v-for="category in roomCategories" :key="category.id">
             <Room :room="category"/>
         </div>
        <div class="p-8 flex">
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

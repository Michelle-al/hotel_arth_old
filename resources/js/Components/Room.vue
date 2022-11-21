<template>
    <div
        class="flex flex-col m-6 border-arth-dark-blue border-2 lg:flex-row lg:border-none p-4 lg:p-0 lg:m-0 lg:justify-around bg-white lg:mx-auto"
        :class="(room.id == 2) ? 'lg:flex-row-reverse' : ''">
        <div>
            <img :src="room.url" class="lg:max-w-3xl"/>
        </div>

        <div class="flex flex-col p-8">
            <h2>{{room.title_french}}</h2>
            <p>{{room.description_french}}</p>
            <button>Découvrir</button>
        </div>
    </div>



</template>

<script>
    export default {
        name: 'Room',
        props: ['room'],
        mounted() {
            console.log(this.room)
        }
    }
</script>

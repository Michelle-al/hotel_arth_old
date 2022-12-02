<template>
    <div
        class="flex flex-col m-6 p-4 border-arth-dark-blue border-2 lg:flex-row lg:border-none lg:p-0 lg:m-0 lg:justify-around bg-white"
        :class="(room.id == 2) ? 'lg:flex-row-reverse' : ''">
        <div class="lg:basis-2/3">
            <img :src="room.media_url" />
        </div>

        <div class="flex flex-col p-8 justify-around lg:basis-1/3">
            <h2>{{room.title}}</h2>
            <p class="text-justify">{{room.description}}</p>
            <button v-if="room.id == 1" class="border-arth-yellow hover:bg-arth-yellow">{{ $t("buttons.discover") }}</button>
            <button v-if="room.id == 2" class="border-arth-light-blue hover:bg-arth-light-blue">{{ $t("buttons.discover") }}</button>
            <button v-if="room.id == 3" class="border-arth-dark-blue hover:bg-arth-dark-blue hover:text-white">{{ $t("buttons.discover") }}</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Room',
        props: ['room']
    }
</script>

<style scoped>

button {
    @apply mt-6 lg:mt-0
}

</style>

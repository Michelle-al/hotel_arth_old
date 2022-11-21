<template>

</template>

<script>
    export default {
        data() {
            return {
                roomCategories: []
            }
        },
        async mounted() {
            const response = await axios.get('/api/home/room_categories');
            this.roomCategories = {...response.data};
        }
    }
</script>

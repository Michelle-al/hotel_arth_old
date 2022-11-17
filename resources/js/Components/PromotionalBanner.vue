<template>
    <div>{{ promotionalBanner.text_french }}</div>
</template>

<script>
    export default {
        data() {
            return {
                PromotionalBanner: {}
            }
        },
        async mounted() {
            const response = await axios.get('api/home/Promotional_banner');
            this.promotionalBanner = {...response.data};
        }
    }

</script>

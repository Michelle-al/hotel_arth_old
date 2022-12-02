<template>
    <footer>
        <div class=" px-10 pt-0 pb-5 bg-arth-dark-blue flex flex-col md:block">
            <h3 class="text-white text-start font-poiret text-4xl"><a href="#">Hôtel ARTH</a></h3>
            <div class="flex flex-col md:flex-row justify-around mx-auto md:m-0">
                <div class="flex flex-col" >
                    <div v-for="link in footer" :key="link.id">
                        <p><a v-if="link.column_number === '1'">{{ link.entry_name }}</a></p>
                    </div>
                </div>
                <div class="flex flex-col" >
                    <div v-for="link in footer" :key="link.id">
                        <p><a v-if="link.column_number === '2'">{{ link.entry_name }}</a></p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div>
                        <p>{{$t("footer.joinUs")}}</p>
                    </div>
                    <SocialMedia />
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import SocialMedia from "../Views/LandingPage/Components/SocialMedia";
export default {
    components: {SocialMedia},
    data() {
        return {
            footer: {}
        }
    },
    async mounted() {
        const response = await axios.get('api/home/footer');
        this.footer = {...response.data['data']};
    },
    methods: {

    }
}
</script>

<style scoped>
a{
    @apply text-white link link-hover;
}
p{
    @apply text-lg;
}
</style>

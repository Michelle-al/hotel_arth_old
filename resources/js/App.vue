<template>
    <div class="flex flex-col min-h-screen justify-between">
        <Navbar />
        <router-view />
        <Footer />
    </div>
</template>

<script>
import Footer from './Components/Footer.vue'
import Navbar from "./Components/Navbar";
import {useUserStore} from "../stores/userStore";


export default {
    name: "App.vue",
    components: { Navbar, Footer },

    mounted() {
        this.checkUserConnection()
    },
    methods: {
        checkUserConnection(){
            // Check if user is Authenticate
            const userStore = useUserStore();
            if(userStore.isLogged){
                    userStore.getUser();
            }
        }
    }
}
</script>




<template>
    <div class="section--video">
        <h2 class="video--h2">{{ promesse }}</h2>
        <h3 class="video--h3">{{ subPromesse }}</h3>
        <video class="video--media" controls autoplay="false" preload="auto">

<!--           TODO- la video chargée ne fonctionne pas, trouver une autre vidéo-->
<!--            <source-->
<!--                src="/public/storage/video/presentation_video.mp4"-->
<!--                            :src="presentationVideo.dynamicSrc"-->
<!--                            :type="presentationVideo.type"-->
<!--            >-->
            <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>
        </video>
    </div>

</template>

<script>

export default {
    name: "VideoSection.vue",
    data() {
        return {
            promesse : "Séjour de rêve",
            subPromesse : "Découvrez les différentes activités aux alentours de l'hôtel Arth.",
            presentationVideo : {
                dynamicSrc: {},
                type: "video/mp4",

            }
        }
    },
    async mounted() {
        const response = await axios.get('api/home/presentation-video');
        this.presentationVideo = {...response.data};
    }
}
</script>

<style scoped>

    .section--video {

    }
    .video--h2 {
        /*@apply ;*/
    }

    .video--h3 {
        /*@apply ;*/
    }

    .video--media {
        @apply w-96 m-auto;
    }

</style>

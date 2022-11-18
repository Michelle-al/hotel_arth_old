<template>
    <div class="section--video"> <!-- BEM Syntax for classes -->
        <div class="section--video-content">
            <div class="section--video-text">
<!--                TODO - Add v-if v_else for languages Fr - En-->
                <h2 class="video--h2">{{ presentationVideo.title }}</h2>
                <h3 class="video--h3">{{ presentationVideo.description }}</h3>
            </div>

            <video class="video--media" :src="presentationVideo.video_url" controls preload="auto">
                <p>Vidéo de Denys Gromov: https://www.pexels.com/fr-fr/video/assiette-salade-sain-bois-5223106/</p>
                <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>
            </video>
        </div>
            <button class="video--button-reservation">Réserver</button>
        </div>


</template>

<script>

export default {
    name: "VideoSection.vue",
    data() {
        return {
            presentationVideo: {}
        }
    },
    async mounted() {
        const response = await axios.get('api/home/presentation_video');
        this.presentationVideo = {...response.data};
    }
}
</script>

<style scoped>
    .section--video {
        @apply flex flex-col lg:mx-6 my-6;
    }

    .section--video-content {
        @apply flex flex-col lg:flex-row-reverse my-3 justify-around lg:mx-6 my-6;
    }
    .video--h2 {
        @apply text-3xl ;
    }

    .video--h3 {
        @apply text-xl ;
    }

    .section--video-text {
        @apply flex flex-col align-middle justify-center;
    }

    .video--media {
        @apply w-max lg:mx-6 w-full aspect-video;
        max-height: 400px;
    }

    .video--button-reservation {
        /*@apply mx-auto*/
    }

</style>

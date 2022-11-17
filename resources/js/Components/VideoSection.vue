<template>
    <div class="section--video"> <!-- BEM Syntax for -->
        <div>
            <h2 class="video--h2">{{ presentationVideo.title }}</h2>
            <h3 class="video--h3">{{ presentationVideo.description }}</h3>
        </div>

        <iframe
            class="video--media"
            src="https://www.youtube-nocookie.com/embed/DYMmMoJAfbw"
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            loading="lazy"
            name="vidéo de présentation de l'hôtel Arth"
        >
        </iframe>

<!--        <video class="video&#45;&#45;media" controls preload="auto">-->
<!--            <source-->
<!--                src="/public/storage/video/presentation_video.mp4"-->
<!--            >-->
<!--            <source-->
<!--                src="storage/app/public/video/presentation_video.mp4" >-->
<!--            <p>Vidéo de Denys Gromov: https://www.pexels.com/fr-fr/video/assiette-salade-sain-bois-5223106/</p>-->
<!--            <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>-->
<!--        </video>-->
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
        const response = await axios.get('api/home/presentation-video');
        this.presentationVideo = {...response.data};
        console.log("je suis une video");
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

<template>
    <div class="flex flex-row space-x-4 mt-3.5" aria-label="navigation">
        <div v-for="icon in socialMedias" :key="icon.id">
            <a :href="icon.social_url" target="_blank" >
                <img class="w-8 hover:scale-105" :src=icon.logo_url
                    :alt="icon.logo_alt"
                    aria-label="Lien vers un réseau social de l'Hôtel Art"
                    role="link">
            </a>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            socialMedias: []
        }
    },
    async mounted() {
        const response = await axios.get('api/home/social_medias');
        this.socialMedias.push(...response.data) ;
    }
}
</script>

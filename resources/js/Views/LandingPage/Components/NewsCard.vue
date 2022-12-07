<template>
    <div class="flex flex-col">
        <img :src="newsArticle.media_url" :alt="newsArticle.media_alt"/>
        <h2>{{ newsArticle.title }}</h2>
        <p>{{ newsArticle.description }}</p>
    </div>
</template>

<script>
    export default {
        name: 'NewsCard',
        props:
            ['newsArticle']
    }
</script>

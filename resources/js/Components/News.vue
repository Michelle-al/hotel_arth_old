<template>
    <div class="flex">
        <div class="w-2/12 flex items-center">
            <div class="w-2/12 flex items-center">Prev</div>
        </div>

        <div id="sliderContainer" class="w-full w-10/12 h-96 border border-black overflow-x-auto">
            <div id="slider" class="flex w-full border border-red-500">
                <div class="w-96 p-5"
                    v-for="newsArticle in news" :key="newsArticle.id">
                    <NewsCard class="border border-arth-dark-blue p-5"
                              :newsArticle="newsArticle"/>
                </div>
            </div>
        </div>

        <div class="w-2/12 flex items-center">
            Next
        </div>
    </div>
</template>

<script>
import NewsCard from "./NewsCard";
    export default {
        name: 'News',
        components: { NewsCard },
        data() {
            return {
                news: []
            }
        },
        async mounted() {
            const response = await axios.get('api/home/news');
            this.news.push(...response.data['data']);
        }
    }
</script>

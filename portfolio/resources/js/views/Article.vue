<template>
    <div>
        <HeaderMenu></HeaderMenu>
        
        <FadeAnimation>
            <div class ="w-10/12 mx-auto">
                <div v-if="loading" class="loader">Now loading...</div>
                <div v-else>
                <article>
                    <div class="text-base xl:w-2/5 lg:w-3/6 md:w-auto sm:w-auto mx-auto mt-3">
                        <h1 class="font-bold lg:text-5xl text-4xl text-green-600 text-left">{{ postData.title }}</h1>
                        <time class="text-gray-600" :datetime="postData.created_at">{{ postData.created_at }}</time>
                        <ArticleBody :artcle-text="postData.content" class="my-4"></ArticleBody>
                    </div>
                </article>
                </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import FadeAnimation from "../components/FadeAnimation.vue";
import ArticleBody from "../components/ArticleBody.vue";
import axios from "axios";


export default {
    components: {
        FadeAnimation,
        ArticleBody,
    },
    data: () => {
        return {
            loading: true,
            postData:{},
        };
    },
    watch:{
        '$route': {
            handler: 'fetchData',
            immediate: true
        },
    },
    created(){
        this.fetchData
    },
    methods: {
        fetchData: function(){
            let url = '/api/post/' + this.$route.params.id;
            let self = this;
            axios
            .get(url)
            .then(function(res){
                self.postData = res.data[0];
                self.loading = false;
            })
            .catch((e)=> {
                self.$router.push({ name:"notFound", params:{} });
            })
        },
    },
};
</script>

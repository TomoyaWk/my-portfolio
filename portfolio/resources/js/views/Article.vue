<template>
    <div>
        <HeaderMenu></HeaderMenu>
        
        <FadeAnimation>
            <div>
                <div v-if="loading" class="loader">Now loading...</div>
                <div v-else>
                <article>
                    <Heading :heading="postData.title"></Heading>
                    <div class="article container w-2/5 mx-auto">
                        <time class="text-gray-500 mb-3" :datetime="postData.created_at">{{ postData.created_at }}</time>
                    
                        <ArticleBody :artcle-text="postData.content"></ArticleBody>
                    </div>
                </article>
                </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import ArticleBody from "../components/ArticleBody.vue";
import axios from "axios";


export default {
    components: {
        Heading,
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

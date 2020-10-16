<template>
    <div>
        <HeaderMenu></HeaderMenu>
        
        <FadeAnimation>
            <div>
                <div v-show="loading" class="loader">Now loading...</div>
                <div v-show="!loading" class="article container w-1/2 mx-auto text-left">
                <article>
                    <h1>{{ postData.title }}</h1>
                    <h1>{{ postData.created_at }}</h1>
                    <div v-html="parsedMdtext"></div>
                </article>
                </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import axios from "axios";
import marked from 'marked';

export default {
    components: {
        Heading,
        FadeAnimation,
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
                    console.log(res);
                    self.postData = res.data[0];
                    self.loading = false;
                })
            }
    },
    computed:{
            parsedMdtext: function(){
                return marked(this.postData.content);
            }
    }

};
</script>

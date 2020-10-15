<template>
    <div>
        <HeaderMenu></HeaderMenu>
        
        <FadeAnimation>
            <div>
                <div v-show="loading" class="loader">Now loading...</div>
                <div v-show="!loading" class="container w-1/2 mx-auto text-left">
                    <h1>{{ postData.title }}</h1>
                    <h1>{{ postData.created_at }}</h1>
                    <p>
                        {{ postData.content }}
                    </p>
                </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import axios from "axios";

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

};
</script>

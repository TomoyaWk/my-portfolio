<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container w-10/12 mx-auto text-center">
                <Heading heading="BLOG"></Heading>
                <p class="text-base my-5 mx-1">
                    作成したものに関する記事など雑記を投稿していく予定です。
                </p>
            <div v-show="loading" class="loader">Now loading...</div>
            <div v-show="!loading" v-for="post in postData" :key="post.postId">
                <BlogBox :post-id="post.post_id" :post-title="post.title" :post-date="post.created_at" :lead-text="post.content"></BlogBox>
            </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import BlogBox from "../components/BlogBox.vue";
import axios from "axios";

export default {
    components: {
        Heading,
        FadeAnimation,
        BlogBox
    },
    data:()=> {
        return {
            loading: true,
            postData:[],
        };
    },
    created() {
        let url = '/api/post/list';
        let self = this;
        axios
        .get(url)
        .then(function(res){
            self.postData = res.data;
            self.loading = false;
        })
    },

    
};
</script>

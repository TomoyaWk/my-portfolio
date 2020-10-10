<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container mx-auto text-center">
                <Heading heading="BLOG"></Heading>
                <p class="text-base my-5 mx-1">
                    作成したものに関する記事など雑記を投稿していく予定です。
                </p>
            <div v-for="post in postData" :key="post.postId">
                <BlogBox :post-title="post.postTitle" :post-date="post.postDate" :lead-text="post.leadText"></BlogBox>
            </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import BlogBox from "../components/BlogBox.vue";

export default {
    components: {
        Heading,
        FadeAnimation,
        BlogBox
    },
    data: () => {
        return {
            postData:[
                {
                    "postId": "1",
                    "postDate": "2020/9/1",
                    "postTitle": "ブログタイトル１",
                    "leadText": "leadtextleadtextleadtextleadtext", 
                },
                {
                    "postId": "2",
                    "postDate": "2020/9/1",
                    "postTitle": "ブログタイトル2",
                    "leadText": "leadtext2leadtextleadtextleadtext",
                }
            ]
        };
    }
};
</script>

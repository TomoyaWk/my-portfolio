<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container mx-auto text-center">
                <Heading heading="BLOG"></Heading>
                <p class="text-base my-5 mx-1">
                    作成したものに関する記事など雑記を投稿していく予定です。
                </p>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";

export default {
    components: {
        Heading,
        FadeAnimation
    }
};
</script>

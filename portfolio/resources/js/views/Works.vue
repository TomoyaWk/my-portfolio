<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container mx-auto text-center">
                <Heading heading="WORKS"></Heading>
                <p class="text-base my-5 mx-1">
                    個人開発で作ったものを載せていく予定です。
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

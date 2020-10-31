<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container mx-auto text-center">
                <Heading heading="WORKS"></Heading>
                <p class="text-base my-5 mx-1">
                    個人開発で作ったものを載せていく予定です。
                </p>
                <div class="flex flex-col lg:flex-row lg:flex-wrap">
                    <WorksBox
                        title="ポートフォリオサイト"
                        img-src="/img/work-1.png"
                        :skills="useTech"
                        note="このサイトです、初めての個人開発。"
                        article-link="/blog/1"
                    ></WorksBox>
                    <!-- <WorksBox
                        title="ポートフォリオサイト"
                        :skills="useTech"
                        note="このサイトです、初めての個人開発。"
                    ></WorksBox>
                    <WorksBox
                        title="ポートフォリオサイト"
                        :skills="useTech"
                        note="このサイトです、初めての個人開発。"
                    ></WorksBox>
                    <WorksBox
                        title="ポートフォリオサイト"
                        :skills="useTech"
                    ></WorksBox> -->
                </div>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import FadeAnimation from "../components/FadeAnimation.vue";
import WorksBox from "../components/WorksBox.vue";

export default {
    components: {
        Heading,
        FadeAnimation,
        WorksBox
    },
    data: () => {
        return {
            useTech: ["Laravel", "Vue.js", "tailwind.css"]
        };
    }
};
</script>

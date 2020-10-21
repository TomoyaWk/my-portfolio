<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="mt-5 container mx-auto text-center">
                <div class="my-4">
                    <h1 class="mx-auto my-auto text-6xl font-bold"><span class="border-black border-b-2">404</span></h1>
                    <h1 class="mx-auto my-auto text-2xl font-bold">Not Found</h1>
                </div>
                <p class="mx-auto my-auto text-base">お探しのページは見つかりませんでした</p>
                <router-link to="/" class="text-xl text-green-600">TOPページへ戻る</router-link>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import FadeAnimation from "../components/FadeAnimation.vue";

export default {
    components: {
        FadeAnimation,
    },
    data: () => {
        return {
        };
    }
};
</script>

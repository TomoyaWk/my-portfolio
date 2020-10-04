<template>
    <div>
        <header-menu></header-menu>
        <div class="container mx-auto text-center">
            <section class="my-32">
                <heading heading="ABOUT ME"></heading>
                
                <div class="avator mx-auto">
                    <img class="w-40 rounded-full mx-auto my-5 p-2 border-green-600 border-4" :src="'/img/icon_wild.png'" alt="アイコン">
                </div>

                <p class="text-base my-5">
                    I`m Tomoya Wakamatsu,web developer working in Tokyo.
                </p>
                <p class="text-base">
                    2019/4から、都内のSierでプログラマ/webアプリエンジニアとして働いています。<br>
                    フロントエンドからインフラまで幅広い知識を身に着けたいと日々勉強しています。
                </p>

                <div class="flex flex-row justify-center my-5">
                    <a href="https://twitter.com/waka_000" target="_blank">
                        <img class="mx-2 w-15" :src="'/img/icon_twitter.svg'" alt="twitter">
                    </a>
                    <a href="https://github.com/TomoyaWk" target="_blank">
                        <img class="mx-2 w-15" :src="'/img/icon_github.svg'" alt="github">
                    </a>
                    <a href="mailto:tomoya.portfolio@gmail.com">
                        <img class="mx-2 w-15" :src="'/img/icon_mail.svg'" alt="mail">
                    </a> 
                </div>

            </section>
            <section class="my-32">
                <heading heading="SKILLS"></heading>
                <div class="flex lg:flex-row sm:flex-col justify-around">
                    <skillbox category="Back-end" :skills="backSkills" :frameworks="backFw"></skillbox>
                    <skillbox category="Front-end" :skills="frontSkills" :frameworks="frontFw"></skillbox>
                    <skillbox category="DevOps" :skills="frontSkills" ></skillbox>
                </div>
            </section>


        </div>
    </div>
</template>

<script>
import heading from "../components/Heading.vue";
import skillbox from "../components/SkillBox.vue";

export default {
    components:{
        heading,
        skillbox
    },
    data:() => {
        return {
            backSkills:['PHP'],
            frontSkills:['HTML5','CSS3','Javascript'],
            backFw:['ZendFramework', 'Laravel', 'Wordpress'],
            frontFw:['Vue.js', 'Bootstrap', 'tailwind.css'],
        }
    }

}
</script>
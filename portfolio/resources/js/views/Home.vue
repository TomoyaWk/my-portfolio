<template>
    <div>
        <HeaderMenu></HeaderMenu>
        <FadeAnimation>
            <div class="container mx-auto text-center">
                <section>
                    <Heading heading="ABOUT ME"></Heading>
                    <div class="avator mx-auto">
                        <img
                            class="w-40 rounded-full mx-auto my-5 p-2 border-green-600 border-4"
                            :src="'/img/icon_wild.png'"
                            alt="アイコン"
                        />
                    </div>
                    <div class="w-10/12 mx-auto">
                    <p class="text-base my-5 mx-1">
                        I`m Tomoya Wakamatsu,web developer working in Tokyo.
                    </p>
                    <p class="text-base mx-1">
                        ワカマツ　トモヤと申します。<br />
                        2019/4から、都内のSierでプログラマ/webアプリエンジニアとして働いています。<br />
                        フロントエンドからインフラまで幅広い知識を身に着けたいと日々勉強しています。
                    </p>
                    </div>
                    <div class="flex flex-row justify-center my-5">
                        <a href="https://twitter.com/waka_000" target="_blank">
                            <img
                                class="mx-2 w-15 transform hover:scale-90 ease-in-out duration-300"
                                :src="'/img/icon_twitter.svg'"
                                alt="twitter"
                            />
                        </a>
                        <a href="https://github.com/TomoyaWk" target="_blank">
                            <img
                                class="mx-2 w-15 transform hover:scale-90 ease-in-out duration-300"
                                :src="'/img/icon_github.svg'"
                                alt="github"
                            />
                        </a>
                        <a href="mailto:tomoya.portfolio@gmail.com">
                            <img
                                class="mx-2 w-15 transform hover:scale-90 ease-in-out duration-300"
                                :src="'/img/icon_mail.svg'"
                                alt="mail"
                            />
                        </a>
                    </div>
                </section>
                <section class="my-12">
                    <Heading heading="SKILLS"></Heading>
                    <div class="flex flex-col lg:flex-row justify-around">
                        <SkillBox
                            category="Back-end"
                            :skills="backSkills"
                            :frameworks="backFw"
                        ></SkillBox>
                        <SkillBox
                            category="Front-end"
                            :skills="frontSkills"
                            :frameworks="frontFw"
                        ></SkillBox>
                        <SkillBox
                            category="DevOps"
                            :skills="DevSkills"
                        ></SkillBox>
                    </div>
                </section>
            </div>
        </FadeAnimation>
    </div>
</template>

<script>
import Heading from "../components/Heading.vue";
import SkillBox from "../components/SkillBox.vue";
import FadeAnimation from "../components/FadeAnimation.vue";

export default {
    components: {
        Heading,
        SkillBox,
        FadeAnimation
    },
    data: () => {
        return {
            backSkills: ["PHP"],
            frontSkills: ["HTML5", "CSS3", "Javascript"],
            DevSkills: [
                "Docker",
                "Vagrant",
                "Git/github",
                "Redmine",
                "MySQL",
                "PostgresSQL"
            ],
            backFw: ["ZendFramework", "Laravel", "Wordpress"],
            frontFw: ["Vue.js", "Bootstrap", "tailwind.css"]
        };
    }
};
</script>

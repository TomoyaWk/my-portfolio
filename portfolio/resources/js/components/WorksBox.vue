<template>
    <div class="lg:w-2/5 w-10/12 mx-auto my-5 p-3 border-green-600 border-2">
        <img
            :src="imgSrc"
            :alt="title"
            class="w-full h-auto"
        />
        <div class="my-5">
            <h1 class="font-bold text-2xl text-black">{{ title }}</h1>
            <p>
                {{ note }}
            </p>
            <ul class="mt-2">
                <li
                    class="bg-gray-400 text-black px-3 py-1 m-1 text-sm  inline-block rounded-full"
                    v-for="sk in skills"
                    :key="sk"
                >
                    {{ sk }}
                </li>
            </ul>
        </div>
        <router-link tag="button" :to="articleLink"
            class="bg-green-600 text-white font-bold my-3 py-2 w-full items-center rounded hover:opacity-75"
        >
            Detail
        </router-link>
    </div>
</template>

<script>
export default {
    props: ["title", "imgSrc", "note", "skills", "articleLink"],
    computed: {}
};
</script>

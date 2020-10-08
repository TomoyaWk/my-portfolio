<template>
    <div class="mx-auto my-5 p-3 border-green-600 border-2">
        <img src="https://placehold.jp/320x240.png" :alt="title" class="" />
        <div class="my-5">
            <h1 class="font-bold text-2xl text-black">{{ title }}</h1>
            <p>
                このサイトのことです、初めての個人開発。
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
        <button
            class="bg-green-600 text-white font-bold my-3 py-2 w-full items-center rounded hover:opacity-75"
        >
            Detail
        </button>
    </div>
</template>

<script>
export default {
    props: ["title", "skills"],
    computed: {}
};
</script>

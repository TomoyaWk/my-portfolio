<template>
    <div class="mx-auto my-5 p-3 border-green-600 border-2 w-64 h-64">
        <h1 class="font-bold text-2xl text-black">{{ category }}</h1>
        <ul class="mt-2">
            <li
                class="bg-gray-400 px-2 py-1 m-1 text-sm text-black inline-block rounded-full"
                v-for="sk in skills"
                :key="sk"
            >
                {{ sk }}
            </li>
        </ul>

        <div class="mt-2" v-if="isFw">
            <h1 class="font-bold text-2xl text-black">
                frameworks/library
            </h1>
            <ul class="mt-2">
                <li
                    class="bg-gray-400 px-3 py-1 m-1 text-sm text-black inline-block rounded-full"
                    v-for="fw in frameworks"
                    :key="fw"
                >
                    {{ fw }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ["category", "skills", "frameworks"],
    computed: {
        isFw() {
            return typeof this.frameworks !== "undefined";
        }
    }
};
</script>

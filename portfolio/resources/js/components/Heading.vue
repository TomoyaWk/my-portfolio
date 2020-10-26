<template>
    <div class="my-5 mx-3">
        <h1 class="font-bold lg:text-5xl text-4xl  text-green-600 text-center">
            <span class="border-green-600 border-b-2">{{ heading }}</span>
        </h1>
    </div>
</template>

<script>
export default {
    props: ["heading"]
};
</script>

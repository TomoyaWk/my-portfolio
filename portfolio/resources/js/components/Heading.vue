<template>
    <div class="my-10">
        <h1 class="font-bold text-5xl text-green-600">
            <span class="border-green-600 border-b-2">{{ heading }}</span>
        </h1>
    </div>
</template>

<script>
export default {
    props: ["heading"]
};
</script>

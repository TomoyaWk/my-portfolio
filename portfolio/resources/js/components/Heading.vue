<template>
    <div class="my-2 place-items-center">
        <h1 class="font-sans font-bold text-center text-4xl text-green-600 "><span class="border-green-600 border-b-2">{{ heading }}</span></h1>
    </div>
</template>

<script>

    export default {
        props:[ 'heading' ]
    }
</script>

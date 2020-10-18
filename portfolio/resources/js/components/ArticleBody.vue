<template>
    <div id="markdown-text" v-html="compiledMarkdown">
    </div>
</template>

<script>
import marked from "marked";

export default {
    props: ["artcleText"],

    computed: {
        compiledMarkdown: function() {
            let text = this.artcleText
            return marked(text);
        }
    },
}
</script>

<style scoped>

</style>
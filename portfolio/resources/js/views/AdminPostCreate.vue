<template>
    <div class="main">
        <div v-if="message" class="alert alert-danger">
            {{ message }}
        </div>
        
        <button type="button" class="my-3 btn btn-success">
            確定
        </button>
        <button type="button" class="my-3 btn btn-alart">
            キャンセル
        </button>

        <mavon-editor v-model="value" language="ja"/>
    </div>
</template>

<script>
import Vue from "vue";
import mavonEditor from "mavon-editor";
import "mavon-editor/dist/css/index.css";
Vue.use(mavonEditor);

export default {
    data() {
        return {
            message: false,
            posts: [],
            value: "",
        }
    },
    methods: {
    }
}
</script>

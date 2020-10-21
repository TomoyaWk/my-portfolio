<template>
    <div class="main">
            <div v-show="message" class="my-3 alert alert-info">
                {{ message }}
            </div>
        
            <button @click="createNewPost" class="my-3 btn btn-success">
                投稿する
            </button>

            <router-link to="/admin/" tag="button" class="mx-3 my-3 btn btn-alart">
                キャンセル
            </router-link>
            
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" v-model="postTitle" placeholder="記事タイトル">
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" v-model="draftFlg" id="draft">
                <label class="form-check-label" for="draft">下書きで保存する</label>
            </div>
            
            <div>
                <mavon-editor v-model="postContent" language="ja"/>
            </div>
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
            postTitle: "",
            draftFlg: false,
            postContent: "",
        }
    },
    methods: {
        createNewPost: function(){
            let self = this;
            axios.post('/api/post/create', {
                "title": this.postTitle,
                "content":this.postContent,
                "draft_flg": (this.draftFlg === true ? 1 : 0),
            })
            .then(function(){
                
                self.message = "記事投稿完了しました。";

                setTimeout(() => {
                    self.message = false;
                    self.$router.push("/admin");
                }, 5000); 
            })
            .catch(error => {
                self.message = 'データの更新に失敗しました。';
            })
        }
    }
}
</script>

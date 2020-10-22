<template>
    <div class="main">
            <div v-show="message" class="my-3 alert alert-info">
                {{ message }}
            </div>
        
            <button @click="updatePostData" class="my-3 btn btn-success">
                更新する
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
            
            <div class="d-flex justify-content-center">
                <div v-show="loading" class="spinner-border text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
                <div v-show="!loading">
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
            loading: true,
        }
    },
    created() {
        this.fetchPostData();
    },
    methods: {
        fetchPostData: function(){
            let url = '/api/post/edit/' + this.$route.params.id;
            let self = this;
            axios
            .get(url)
            .then(function(res){
                self.loading = false;
                console.log(res);
                self.postTitle = res.data.title;
                self.postContent = res.data.content;
                self.draftFlg = (res.data.draft_flg === 1 ? true : false);

            })
            .catch((e)=> {
                self.message = 'データの取得に失敗しました。';
            })
        },

        updatePostData: function(){
            let self = this;
            axios.post('/api/post/' + this.$route.params.id, {
                "title": this.postTitle,
                "content":this.postContent,
                "draft_flg": (this.draftFlg === true ? 1 : 0),
            })
            .then(function(){
                
                self.message = "更新しました。";
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

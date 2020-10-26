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
                <input class="form-control form-control-lg" required type="text" v-model="postTitle" placeholder="記事タイトル">
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" v-model="draftFlg" id="draft">
                <label class="form-check-label" for="draft">下書きで保存する</label>
            </div>
            
            <div>
                <mavon-editor ref=md @imgAdd="$imgAdd" @imgDel="$imgDel" v-model="postContent" language="ja"/>
            </div>
    </div>
</template>

<style scoped>
@import url("~mavon-editor/dist/css/index.css");
</style>


<script>
import Vue from "vue";
import mavonEditor from "mavon-editor";

Vue.use(mavonEditor);

export default {
    components: {
        mavonEditor
    },
    data() {
        return {
            message: false,
            postTitle: "",
            draftFlg: false,
            postContent: "",
            img_file: {},
        }
    },
    methods: {
        /**
         * 記事投稿
         */
        createNewPost: async function(){
            if(this.img_file){
                //画像アップロード
                const upd = await this.uploadimg();
            }

            let self = this;
            setTimeout(() => {
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
                    }, 3000); 
                })
                .catch(error => {
                    self.message = 'データの更新に失敗しました。';
                })
            }, 2000);
        },
        /**
         * 画像追加・削除
         * 
         */
        $imgAdd(pos, $file){
            this.img_file[pos] = $file;
        },
        $imgDel(pos){
            delete this.img_file[pos];
        },
        /**
         * 画像アップロード
         * 
         */
        uploadimg($e){
            let formdata = new FormData();
            for(let _img in this.img_file){
                formdata.append(_img, this.img_file[_img]);
            }

            axios({
                url: '/api/post/upload/img',
                method: 'post',
                data: formdata,
                headers: { 'Content-Type': 'multipart/form-data' },
            }).then((res) => {
                let imgs = res.data;
                
                for (let img of imgs) {
                    this.$refs.md.$img2Url(img[0], img[1]);
                }
            })
        }
    }
}
</script>

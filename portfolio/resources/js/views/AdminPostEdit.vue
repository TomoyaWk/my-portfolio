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
                <input class="form-control form-control-lg" required type="text" v-model="postTitle" placeholder="記事タイトル">
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
                    <mavon-editor ref=md @imgAdd="$imgAdd" @imgDel="$imgDel" v-model="postContent" language="ja"/>
                </div>
            
    </div>
</template>

<script>
import {mavonEditor} from "mavon-editor";

export default {
    data() {
        return {
            message: false,
            postTitle: "",
            draftFlg: false,
            postContent: "",
            loading: true,
            img_file: {},
            postProcessing: false
        }
    },
    created() {
        this.fetchPostData();
    },
    methods: {
        //既存記事情報の取得
        fetchPostData: function(){
            let url = '/api/post/edit/' + this.$route.params.id;
            let self = this;
            axios
            .get(url)
            .then(function(res){
                self.loading = false;
                self.postTitle = res.data.title;
                self.postContent = res.data.content;
                self.draftFlg = (res.data.draft_flg === 1 ? true : false);
            })
            .catch((e)=> {
                self.message = 'データの取得に失敗しました。';
            })
        },
        /**
         * 記事情報更新
         */
        updatePostData: async function(){
            if(this.img_file){
                //画像アップロード
                const upd = await this.uploadimg();
            }
            let self = this;
            
            setTimeout(() => {
                axios.post('/api/post/' + this.$route.params.id, {
                    "title": this.postTitle,
                    "content":this.postContent,
                    "draft_flg": (this.draftFlg === true ? 1 : 0),
                })

                .then(function(){
                    console.log(self.postContent);
                    self.message = "更新しました。";
                    setTimeout(() => {
                        self.message = false;
                        self.$router.push("/admin");
                    }, 5000); 
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
                this.message = "画像アップロード中";
                
                for (let img of imgs) {
                    this.$refs.md.$img2Url(img[0], img[1]);
                }
            })
        }
    },
    
}
</script>

<template>
    <div class="main">
        <div v-if="message" class="my-3 alert alert-danger">
            {{ message }}
        </div>
        
        <router-link to="/admin/post/create" tag="button" class="my-3 btn btn-success btn-lg">
            新規作成
        </router-link>

        <div class="d-flex justify-content-center">
            <div v-show="loading" class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
            </div>
        </div>

            <div v-show="!loading">
                <table class="table table-bordered table-hover my-3">
                    <thead class="bg-success text-white">
                        <th scope="col" style="width:10%;">ID</th>
                        <th scope="col" style="width:10%;">ステータス</th>
                        <th scope="col" style="width:70%;">タイトル</th>
                        <th scope="col" style="width:5%;">編集</th>
                        <th scope="col" style="width:5%;">削除</th>
                    </thead>
                    <tbody class="">
                        <tr v-for="post in posts" :key="post.postId">
                            <td> {{ post.post_id }} </td>
                            <td> 
                                <span class="badge badge-info p-2 text-white"> {{ isDraft(post.draft_flg) }} </span>
                            </td>
                            <td> {{ post.title }}  </td>
                            
                            <!-- 編集アイコン -->
                            <td class="text-primary"> 
                                <router-link :to="{ name:'adminPostEdit', params:{ id: post.post_id } }">
                                    <i class="far fa-edit fa-lg"></i>
                                </router-link>
                            </td>
                            
                            <!-- 削除アイコン -->
                            <td class="text-danger"> 
                                <i class="far fa-trash-alt fa-lg" data-toggle="modal" :data-target="setModalClass(post.post_id, true)"></i>     
                            </td>

                            <!-- 削除モーダル -->
                            <div class="modal fade" :id="setModalClass(post.post_id, false)" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                            <div class="modal-body">
                                                {{ post.title }} を本当に削除しますか？ 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                                <button type="button" class="btn btn-danger" @click="deletePostData(post.post_id)">削除する</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: false,
            posts: [],
            loading: true,
        }
    },
    methods: {
        isDraft(val) {
            return (val === 1 ? '下書き' : '公開');
        },
        setModalClass: function(postId, isTarget) {
            return  (isTarget === true ? "#deleteModal-" + postId : "deleteModal-" + postId);
        },
        deletePostData: function(postId){
            console.log(postId);
        }
    },
    created() {
        axios.get('/api/post')
            .then(res => {
                this.posts = res.data;
                this.loading = false;
            })
            .catch(error => {
                this.message = 'データの取得に失敗しました。';
            });
    }
}
</script>

<template>
    <div class="main">
        <div v-if="message" class="my-3 alert alert-danger">
            {{ message }}
        </div>
        
        <router-link to="/admin/post/create" tag="button" class="my-3 btn btn-success btn-lg">
            新規作成
        </router-link>

        <table class="table table-bordered table-hover my-3">
            <thead class="bg-success text-white">
                <th scope="col" style="width:10%;">ID</th>
                <th scope="col" style="width:10%;">ステータス</th>
                <th scope="col" style="width:80%;">タイトル</th>
            </thead>
            <tbody class="">
                <tr v-for="post in posts" :key="post.postId">
                    <td> {{ post.post_id }} </td>
                    <td> 
                        <span class="badge badge-info p-2 text-white"> {{ isDraft(post.draft_flg) }} </span>
                    </td>
                    <td > {{ post.title }}  </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    data() {
        return {
            message: false,
            posts: []
        }
    },
    methods: {
        isDraft(val) {
            return (val === 1 ? '下書き' : '公開');
        }
    },
    created() {
        axios.get('/api/post')
            .then(res => {
                this.posts = res.data;
            })
            .catch(error => {
                this.message = 'データの取得に失敗しました。';
            });
    }
}
</script>

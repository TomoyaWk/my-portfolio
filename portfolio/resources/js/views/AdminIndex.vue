<template>
    <div class="posts">
        <div v-if="message" class="alert alert-danger">
            {{ message }}
        </div>


        <table class="table table-striped table-hover my-5">
            <thead class="table-success">
                <th>postID</th>
                <th>Status</th>
                <th>title</th>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.postId">
                    <td> {{ post.post_id }} </td>
                    <td> 
                        <span class="badge badge-info p-2 text-white"> {{ isDraft(post.draft_flg) }} </span>
                    </td>
                    <td> {{ post.title }}  </td>
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
    mounted() {
        axios.get('/api/post')
            .then(res => {
                console.log(res);
                this.posts = res.data;
            })
            .catch(error => {
                this.message = 'データの取得に失敗しました。';
            });
    }
}
</script>

<template>
    <div class="posts">
        <div v-if="message" class="alert alert-danger">
            {{ message }}
        </div>
        <ul>
            <li v-for="post in posts" :key="post.postId">
                {{ post.title }}
            </li>
        </ul>
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
    mounted() {

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

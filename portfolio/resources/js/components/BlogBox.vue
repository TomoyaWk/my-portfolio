<template>
    <div class="text-left lg:w-2/5 mx-auto my-5">
        
            <div class="my-3">
                <span class="text-md text-gray-500 my-1">{{ postDate }}</span>
            
            <router-link :to="{ name:'article', params:{ id: postId } }" class="hover:no-underline hover:text-green-600">
                <h1 class="font-bold text-2xl text-green-600 my-1">
                    <span class="post-title"> {{ postTitle }}</span> 
                </h1>
            </router-link>

                <p>{{ formatLeadTxt + '....' }}</p>
            </div>
        
    </div>
</template>

<script>
export default {
    props: ["postId", "postTitle", "postDate", "leadText"],
    computed: {
        formatLeadTxt(){
            return this.leadText.slice(0,45);
        }
        
    }
};
</script>

<style scoped>
.post-title {
    position: relative;
}

.post-title::before {
    position: absolute;
    top: 1.3em;
    left: 0;
    content: "";
    display: inline-block;
    width: 0;
    height: 2px;
    background: #008f2b;
    transition: 0.3s;
}
.post-title:hover:before {
    width: 100%;
}
</style>

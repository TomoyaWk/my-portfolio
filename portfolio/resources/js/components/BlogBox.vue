<template>
    <div class="text-left w-4/5 mx-auto my-5 p-3 border-green-600 border-2 ">
        
        <a href="#">
            <div class="my-5">
                <span class="text-md text-gray-500">{{ postDate }}</span>
                <h1 class="font-bold text-2xl text-green-600">
                    <span class="post-title"> {{ postTitle }}</span> 
                </h1>
                <p>{{ leadText }}</p>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ["postTitle", "postDate", "leadText"],
    computed: {}
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

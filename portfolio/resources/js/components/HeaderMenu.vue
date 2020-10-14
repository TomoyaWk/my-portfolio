<template>
    <nav class="border-t-8 border-green-600">
        <ul class="flex flex-row  justify-around lg:justify-center my-5">
            <li class="menu font-bold text-2xl text-green-600 lg:mx-20">
                <router-link to="/">Home</router-link>
            </li>
            <li class="menu font-bold text-2xl text-green-600 lg:mx-20">
                <router-link to="/works">Work</router-link>
            </li>
            <li class="menu font-bold text-2xl text-green-600 lg:mx-20">
                <router-link to="/blog/list">Blog</router-link>
            </li>
        </ul>
    </nav>
</template>

<script></script>

<style scoped>
.menu {
    position: relative;
}

.menu::before {
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
.menu:hover:before {
    width: 100%;
}
</style>

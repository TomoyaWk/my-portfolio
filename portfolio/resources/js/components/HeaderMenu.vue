<template>
    <nav  class="border-b-4 border-green-600">
        <ul class="flex flex-row  justify-around  lg:justify-center  my-5">
            <li class="menu font-sans font-bold text-2xl text-green-600 lg:mx-20 transition duration-500 ease-in-out"><router-link to="/">Home</router-link></li>
            <li class="menu font-sans font-bold text-2xl text-green-600 lg:mx-20 hover:opacity-75"><router-link to="/works">Work</router-link></li>
            <li class="menu font-sans font-bold text-2xl text-green-600 lg:mx-20 hover:opacity-75"><router-link to="/blog/list">Blog</router-link></li>
        </ul>
        
    </nav>
</template>

<script>


</script>

<style scoped>
.menu{
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
    background: #008F2B;
    transition: 0.5s;
}
.menu:hover:before{
    width: 100%;
}

</style>
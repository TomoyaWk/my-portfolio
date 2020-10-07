<template>
    <transition name="fade" appear mode="out-in">
        <slot></slot>
    </transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.7s;
    transform: rotateX(0);
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
    transform: rotateX(-10deg);
}
</style>

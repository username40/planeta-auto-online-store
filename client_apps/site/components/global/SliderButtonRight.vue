<template>
    <button class="slider-button grey-border"><img src="/icons/slider-arrow.svg" alt=""></button>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .slider-button_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
        -webkit-border-top-left-radius: 0px;
        border-top-left-radius: 0px;
        -webkit-border-bottom-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    .slider-button > img {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
</style>
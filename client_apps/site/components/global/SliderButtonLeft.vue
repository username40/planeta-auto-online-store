<template>
    <button class="slider-button grey-border"><img src="/icons/slider-arrow.svg" alt=""></button>
</template>

<script>
export default {
    props:['className']
}
</script>

<style scoped>
    .slider-button_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
        -webkit-border-top-right-radius: 0px;
        border-top-right-radius: 0px;
        -webkit-border-bottom-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }
</style>

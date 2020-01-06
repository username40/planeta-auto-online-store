<template>
    <p class="Old-price"><span class="black-line"></span><span class="white-line"></span>102 790 ₽</p>
</template>

<script>
    export default {
        name: "OldPrice"
    }
</script>

<style scoped>
.Old-price {
    padding-left: 8px;
    padding-right: 8px;
    position: relative;
}

    .black-line {
        background-color: var(--asphalt_dark);
        position: absolute;
        top: 50%;
        margin-top: -1px;
        left: 0;
        right:0;
        height: 1px;
    }
    .white-line {
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 0;
        right:0;
        height: 1px;
    }
</style>
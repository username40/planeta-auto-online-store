<template>
    <div class="select-container">
    <select class="Body-18 select-input"
    :disabled="disabled">
        <slot/>
    </select>
<!--        <span class="triangle"></span>-->
    </div>
</template>

<script>
    export default {
        name: "Select",
        props: ['disabled']
    }
</script>

<style scoped>
    .select-container {
        position: relative;
        display: block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;

    }
    .select-input {
        width: 100%;
        margin-top: 10px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: solid 1px #918dae;
        padding-left: 16px;
        padding-top: 12px;
        padding-bottom: 14px;
        padding-right: 20px;
    }

    .triangle {
        position: absolute;
        top: 50%;
        right: 14px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 3.5px 0 3.5px;
        border-color: var(--asphalt_dark) transparent transparent transparent;
    }
    .select-input[disabled] {
        background-color: var(--milk);
        border: solid 1px var(--asphalt_light);
        color: var(--asphalt);
    }

    .select-input[disabled] .triangle {
        border-color: var(--asphalt) transparent transparent transparent;
    }
</style>
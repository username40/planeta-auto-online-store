<template>
    <button class="h3 show-more-btn grey-border" :class="className"><slot/></button>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .show-more-btn {
        background-color: var(--just_white);
        padding-top: 12px;
        padding-bottom: 14px;
        text-align: center;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        border-style: solid;
        border-width: 0.5px;
        -webkit-background-origin: border-box;
        background-origin: border-box;
        background-clip: border-box;
        text-align: center;
        color: var(--blueberry);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: var(--animation);
        padding-left: 16px;
        padding-right: 16px;
        cursor: pointer;
    }

    .show-more-btn:hover {
        background-color: var(--blueberry_lite);
        color: var(--just_white);
    }

    .show-more-btn:active {
        background-color: var(--blueberry_deep);
        color: var(--just_white);
        box-shadow: none;
    }

    .width100 {
        width: 100%
    }
    
    .show-more-btn_blue-btn {
        background-color: var(--blueberry);
        color: var(--just_white);
        transition: all var(--animation);

    }

    .show-more-btn_blue-btn:hover {
        background-color: var(--just_white);
        color: var(--blueberry);
    }
</style>

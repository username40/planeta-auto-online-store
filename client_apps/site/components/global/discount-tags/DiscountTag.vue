<template>
    <span class="discount-tag" :class="className">
        <slot/>
    </span>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .discount-tag {
        padding-left: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        padding-right: 10px;
        text-align: center;
        color: var(--just_white);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        float: left;
        position: relative;
        z-index: 10;
        display: flex;
        align-items: center;
        height: 100%;
    }

    .discount-tag_azalea {
        background-color: var(--azalea);
    }

    .discount-tag_glory {
        background-color: var(--glory);
    }

    .discount-tag_violet {
        background-color: var(--violet);
    }

    .discount-tag_lemon {
        background-color: var(--lemon);
        color: #512794;
    }

    .discount-tag_text-color-blue {
        color: #512794;
    }
</style>

<template>
    <nuxt-link  class="Body-18-Prime main-menu-btn grey-border" :class="this.className" :to="{path: pathForPage}">
        <slot name="image"/>
        <slot name="buttonName"/>
    </nuxt-link>
</template>

<script>
    export default {
        props: ['className', 'pathForPage'],
        name: "MainMenuButton",
        data() {
            return {
            }
        }
    }
</script>

<style scoped>
    .main-menu-btn {
        padding-left: 10px;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        padding-bottom: 9px;
        padding-right: 12px;
        padding-top: 6px;
        display: flex;
        align-items: center;
        background-color: #fff;
        text-decoration: none;
        white-space: nowrap;
        transition: all var(--animation);
    }

    .main-menu-btn:hover {
        text-decoration: none;
        box-shadow: var(--shadow-6-prime);
    }
    .main-menu-btn > img {
        margin-right: 6px;
    }
</style>
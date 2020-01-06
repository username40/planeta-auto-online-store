<template>
    <a href="#" class="download-link Body-16-White grey-border">Скачать</a>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .download-link {
        background-color: var(--blueberry);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-background-origin: border-box;
        background-origin: border-box;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        text-decoration: none;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 2px;
        padding-bottom: 4px;
    }

    .download-link:hover {
        background-color: var(--blueberry_lite);
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .download-link:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }
</style>


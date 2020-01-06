<template>
    <a href="#" class="navigate-link grey-border"><slot/></a>
</template>

<script>
export default {
    props:['className']
}
</script>

<style scoped>
    .navigate-link {
        text-decoration: none;
        text-align: center;
        padding-top: 6px;
        padding-left: 24px;
        padding-right: 24px;
        padding-bottom: 10px;
        transition: all var(--animation)
    }
    .navigate-link_left-side {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .navigate-link_right-side {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .navigate-link_blueberry-color {
        background-color: var(--blueberry);
        color: var(--just_white);
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color .2s linear;
    }

    .navigate-link_blueberry-color:hover {
        background-color: var(--blueberry_lite);
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .navigate-link_blueberry-color:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }

    .navigate-link_just-white-color {
        color: var(--blueberry);
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        -webkit-background-origin: border-box;
        background-origin: border-box;
        background-clip: border-box;
        -webkit-transition: .2s linear;
        -o-transition: .2s linear;
        transition: .2s linear;
    }

    .navigate-link_just-white-color:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .navigate-link_just-white-color:active{
        background-color: var(--blueberry_deep);
        color: var(--just_white);
        box-shadow: none;
    }
</style>
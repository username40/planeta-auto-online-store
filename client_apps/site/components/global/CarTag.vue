<template>
        <button class="Body-18 car-tag grey-border">
            <span class="car-icon"></span>
            <slot/>
        </button>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .car-tag {
        padding-left: 22px;
        padding-right: 22px;
        padding-top: 6px;
        padding-bottom: 10px;
        border: none;
        margin-left: -1px;
        margin-right: -2px;
    }

    .car-tag_blue {
        background-color: var(--blueberry);
        color: var(--just_white);
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color .2s linear
    }

    .car-tag_blue:hover {
        background-color: var(--blueberry_lite);

    }
    .car-tag_blue:active {
        background-color: var(--blueberry_deep);
    }

    .car-tag_white {
        background-color: var(--just_white);
        color: var(--blueberry);
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        border-style: solid;
        border-width: 0.5px;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }

    .car-tag_white:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .car-tag_white:active {
        background-color: var(--blueberry_deep);
        color: var(--just_white);
    }

    .car-tag_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .car-tag_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .car-icon {
        width: 24px;
        height: 24px;
        display: inherit;
        background-repeat: no-repeat;
        margin-bottom: -6px;
    }

    .car-icon_blue .car-icon{
        background-image: url('/icons/car-tag_blue-icon.svg');
    }

    .car-icon_blue:active .car-icon {
        background-image: url('/icons/car-tag_white-icon.svg');
    }

    .car-icon_white .car-icon{
        background-image: url('/icons/car-tag_white-icon.svg');
    }
</style>

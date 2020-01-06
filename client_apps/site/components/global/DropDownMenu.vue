<template>
    <div class="kebab-dropdown-menu" @click="showDropDown = !showDropDown">
        <button class="kebab-dropdown-menu__button">...</button>
        <div class="kebab-dropdown-menu__menu" v-show="showDropDown">
            <div class="square"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showDropDown: false
        }
    }
}
</script>

<style scoped>
    .kebab-dropdown-menu {
        position: relative;
        margin-left: 200px;
    }

    .kebab-dropdown-menu__button {
        height: 22px;
        padding: 8px;
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
        background-color: var(--blueberry);
        color: var(--just_white);
        border: none;
    }
    .kebab-dropdown-menu__menu {
        position: absolute;
        z-index: 2;
        top: 51px;
        padding: 15px;
        background-color: #ccc;
        -webkit-box-shadow: 0 1px 5px 0 rgba(50, 55, 125, 0.2), 0 3px 1px -2px rgba(50, 55, 125, 0.12), 0 2px 2px 0 rgba(50, 55, 125, 0.14);
        box-shadow: 0 1px 5px 0 rgba(50, 55, 125, 0.2), 0 3px 1px -2px rgba(50, 55, 125, 0.12), 0 2px 2px 0 rgba(50, 55, 125, 0.14);
        background-image: -webkit-gradient(linear, left top, left bottom, from(var(--just_white)), to(#f9fafb));
        background-image: -webkit-linear-gradient(top, var(--just_white), #f9fafb);
        background-image: -o-linear-gradient(top, var(--just_white), #f9fafb);
        background-image: linear-gradient(to bottom, var(--just_white), #f9fafb);
        -webkit-border-radius: 6px;
        border-radius: 6px;
    }

    .square {
        position: absolute;
        z-index: 3;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        background-color: var(--just_white);
        width: 13px;
        height: 13px;
        top: -7px;
        right: 8px;
        border-top: 0.5px solid rgba(0, 0, 0, 0.08);
        border-left: 0.5px solid rgba(0, 0, 0, 0.08);
    }
</style>
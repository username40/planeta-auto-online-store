<template>
    <div style="">
        <input type="radio"
               :id="identifier"
               class="radio-search-select__input"
               :name="this.name"
               @click="showDropDown = !showDropDown">
        <label :for="identifier" :class="className">
            <slot/>
            <div class="kebab-dropdown-menu__menu" v-show="showDropDown">
                <div class="square"></div>
            </div>
        </label>
    </div>
</template>

<script>
    export default {
        name: "RadioSearchSelectDropdown",
        props: ['identifier', 'className', 'name'],
        data() {
            return {
                showDropDown: false
            }
        }
    }
</script>

<style scoped>

    .radio-search-select_last {
        border-left: none!important;
    }

    .radio-search-select__input {
        display: none;
    }

    .radio-search-select__label {
        display: flex;
        padding: 10px 23px;
        float: left;
        height: 44px;
        position: relative;
    }

    .radio-search-select__label:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }
    .radio-search-select__input:checked + .radio-search-select__label {
        background-color: #32377d;
        color: #fff;
    }

    .radio-search-select__label_last {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .radio-search-select__label_last-dotted {
        padding-left: 8px;
        padding-right: 8px;
    }
    .car-icon {
        width: 24px;
        height: 24px;
        display: inherit;
        background-repeat: no-repeat;
        margin-bottom: -6px;
    }

    .car-icon_dropdown {
        width: 24px;
        height: 24px;
        display: inherit;
        background-repeat: no-repeat;
        margin-bottom: -6px;
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


    .car-icon_blue .car-icon{
        background-image: url('/icons/car-tag_blue-icon.svg');
    }

    .car-icon_black .car-icon{
        background-image: url('/icons/car_black.svg');
    }

    .car-icon_dotted .car-icon_dropdown {
        background-image: url('/icons/3-dots-vertical_black.svg');
    }

    .radio-search-select__input:checked + .car-icon_dotted > .car-icon_dropdown {
        /*.car-icon_blue:checked .car-icon {*/
        background-image: url('/icons/3-dots-vertical_white.svg');
    }

    .radio-search-select__input:checked + .radio-search-select__label > .car-icon {
        background-image: url('/icons/car-tag_white-icon.svg');
    }

    .car-icon_white .car-icon{
        background-image: url('/icons/car-tag_white-icon.svg');
    }

    .car-icon_white:active .car-icon{
        background-image: url('/icons/car-tag_blue-icon.svg');
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

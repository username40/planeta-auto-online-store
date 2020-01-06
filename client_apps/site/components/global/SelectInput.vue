<template>
    <form action="#" class="select-input-form">
        <input type="text" class="select-input-form__input"
               v-bind:placeholder="placeholder"
        >
        <div class="list-opener-btn" @click="showList = !showList">
            <span class="triangle"></span>

        </div>
        <div class="dropdown-menu-list" v-show="showList">
            <slot/>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['className', 'disabled'],
        name: "SelectInput",
        data() {
            return {
                placeholder: "Плейсхолдер",
                showList: false
            }
        }
    }
</script>

<style scoped>
    .select-input-form {
        position: relative;
        display: table;
    }

    .select-input-form__input {
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        padding-left: 16px;
        padding-top: 12px;
        padding-bottom: 14px;
        padding-right: 52px;
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--asphalt);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        cursor: pointer;
        max-width: 250px;
        max-height: 50px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .select-input-form__input:focus {
        color: var(--just_black);
        border: 2px solid var(--blueberry_lite);
    }

    .select-input-form__input:hover {
        background-color: var(--snow);
    }

    .select-input-form__input_error > .select-input-form__input{
        border: solid 1px var(--azalea);
        background-color: #ffd9d9;
    }



    .list-opener-btn {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        border:none;
        background-color: transparent;
        position: absolute;
        z-index: 2;
        top: 50%;
        right: 12px;
        margin-top: -9px;
        padding: 5px;
    }
    .triangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 3.5px 0 3.5px;
        border-color: var(--asphalt_dark) transparent transparent transparent;
    }

    .dropdown-menu-list {
        position: absolute;
        z-index: 5;
        top: 50px;
        right: 0;
        -webkit-box-shadow: 0 1px 5px 0 rgba(50, 55, 125, 0.2), 0 3px 1px -2px rgba(50, 55, 125, 0.12), 0 2px 2px 0 rgba(50, 55, 125, 0.14);
        box-shadow: 0 1px 5px 0 rgba(50, 55, 125, 0.2), 0 3px 1px -2px rgba(50, 55, 125, 0.12), 0 2px 2px 0 rgba(50, 55, 125, 0.14);
        background-image: -webkit-gradient(linear, left top, left bottom, from(var(--just_white)), to(#f9fafb));
        background-image: -webkit-linear-gradient(top, var(--just_white), #f9fafb);
        background-image: -o-linear-gradient(top, var(--just_white), #f9fafb);
        background-image: linear-gradient(to bottom, var(--just_white), #f9fafb);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        width: 100%;
    }

    .select-input-form__input:disabled  {
        border: 1px solid var(--asphalt_light);
        background-color: var(--milk);
    }
</style>
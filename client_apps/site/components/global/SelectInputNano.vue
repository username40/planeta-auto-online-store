<template>
    <form action="#" style="display: table">
        <span class="list-opener-btn" @click="showList = !showList">
            Значение<span class="triangle"></span>
            <div class="dropdown-menu-list" v-show="showList">
                <slot/>
            </div>
        </span>
    </form>
</template>

<script>
    export default {
        name: "SelectInputNano",
        data() {
            return {
                showList: false
            }
        }
    }
</script>

<style scoped>
    .triangle {
        margin-left: 17px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 3.5px 0 3.5px;
        border-color: var(--asphalt_dark) transparent transparent transparent;
    }

    .list-opener-btn {
        -webkit-border-radius: 3px;
        border-radius: 3px;
        position: relative;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--just_black);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        cursor: pointer;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .list-opener-btn:hover {
        background-color: var(--snow);
    }

    .list-opener-btn:focus {
        border: 2px solid var(--blueberry_lite);
    }
    .dropdown-menu-list {
        position: absolute;
        z-index: 5;
        top: 30px;
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
</style>
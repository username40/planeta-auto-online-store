<template>
    <div class="alerts-info" id="111">
        <p class="alerts-info__decription Body-14"> <slot/></p>
        <button class="alerts-info__delete-btn"><img src="/icons/alert-delete-cross.svg" alt="удалить кнопка"></button>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: ['className'],
        methods: {

        }
    }
</script>

<style scoped>
    .alerts-info {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding-left: 4px;
        padding-right: 2px;
        padding-top: 1px;
        width: 100%;
        position: relative;
        z-index: 4;
        border: 1px solid;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        padding-left: 29px;
    }
    .alerts-info__decription {
        margin-bottom: 0rem!important;
        color: var(--just_black);
    }

    .alerts-info__delete-btn {
        background-color: transparent;
        color: var(--asphalt);
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .alerts-info__delete-btn:hover {
        color:  var(--prime_gray);
    }


    .alerts-info__confirm {
        border-color: var(--lime);
        background-color: rgba(150, 195, 45, 0.15);
    }

    .alerts-info__confirm:before {
        content: '';
        background: url("/icons/alerts-icon__confirm.svg");
        position: absolute;
        z-index: 2;
        width: 24px;
        height: 24px;
        left: 3px;
    }

    .alerts-info__information {
        border-color: #512794;
        background-color: rgba(113, 37, 234, 0.15);
    }

    .alerts-info__information:before {
        content: '';
        background: url("/icons/alerts-icon__information.svg");
        position: absolute;
        z-index: 2;
        width: 24px;
        height: 24px;
        left: 3px;
    }
    .alerts-info__warning {
        border-color: var(--lemon_deep);
        background-color: rgba(236, 180, 22, 0.15);
    }

    .alerts-info__warning:before {
        content: '';
        background: url("/icons/alerts-icon__warning.svg");
        position: absolute;
        z-index: 2;
        width: 24px;
        height: 24px;
        left: 3px;
    }

    .alerts-info__error {
        border-color: var(--azalea);
        background-color: #ffd9d9;
    }

    .alerts-info__error:before {
        content: '';
        background: url("/icons/alerts-icon__error.svg");
        position: absolute;
        z-index: 2;
        width: 24px;
        height: 24px;
        left: 3px;
    }
</style>
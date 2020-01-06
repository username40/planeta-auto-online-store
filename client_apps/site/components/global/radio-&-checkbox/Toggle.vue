<template>
    <label class="switch">
    <input type="checkbox">
    <span class="slider round">
        <span class="checked-mark"></span>
    </span>
<!--        <img src="/icons/check-mark.svg" alt="" class="checked-mark">-->

    </label>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .switch {
        position: relative;
        display: inline-block;
        width: 39px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0px;
        left: 0px;
        right: 0;
        bottom: 0;
        background-color: var(--just_white);
        -webkit-transition: .4s;
        border: solid 1px #918dae;
        -o-transition: .1s;
        transition: .1s;
    }

    .slider:before {
        position: absolute;
        content: "";
        top: 1px;
        left: 1px;
        width: 20px;
        height: 20px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        border-style: solid;
        border-width: 0.5px;
        background-color: #efefef;
        -webkit-transition: .1s;
        -o-transition: .1s;
        transition: .1s;
    }

    input:checked + .slider {
        background-color: var(--lime);
        border: solid 1px var(--lime);
    }

    input:focus + .slider {
        -webkit-box-shadow: 0 0 1px #2196F3;
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider::before {
        font-size: 13px;
        text-align: center;
        -webkit-transform: translateX(15px);
        -ms-transform: translateX(15px);
        transform: translateX(15px);
        background-color: #ffffff;
        -webkit-box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 6px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 6px 0 rgba(0, 0, 0, 0.15);
        content: "";
    }


    input:checked + .slider > .checked-mark::before {

        content: '';
        background: url("/icons/check-mark.svg");
        background-size: cover;
        width: 11px;
        height: 8px;
        position: absolute;
        right: 5px;
        top: 8px;
        opacity: 1;
    }

    .slider.round {
        -webkit-border-radius: 20px;
        border-radius: 20px;
    }

    .slider.round:before {
        -webkit-border-radius: 50%;
        border-radius: 50%;
        border: none;
    }

    .slider:hover {
        -webkit-box-shadow: 1px #8487b1;
        box-shadow: 1px #8487b1;
        background-color: rgba(150, 195, 45, 0.7)
    }

    .disabled_not-selected {
        border-color: var(--asphalt_light);
    }

    .disabled_selected {
        background-color: var(--asphalt_light)!important;
    }


</style>

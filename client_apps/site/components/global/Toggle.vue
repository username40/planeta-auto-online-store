<template>
    <label class="switch">
    <input type="checkbox">
    <span class="slider round"></span>
    <img src="/icons/check-mark.svg" alt="" class="checked-mark">
    </label>
</template>

<script>
// write code about disabled and checked!
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
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--just_white);
        -webkit-transition: .4s;
        border: solid 1px #918dae;
        -o-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        width: 20px;
        height: 20px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        border-style: solid;
        border-width: 0.5px;
        border-image-source: linear-gradient(to bottom, #d6d4e8, #918dae);
        border-image-slice: 1;
        background-color: #efefef;
        -webkit-transition: .4s;
        -o-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: var(--lime);
    }

    input:focus + .slider {
        -webkit-box-shadow: 0 0 1px #2196F3;
        box-shadow: 0 0 1px #2196F3;
        border: solid 2px #918dae;
    }

    input:checked + .slider::before {
        font-size: 13px;
        text-align: center;
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
        background-color: #ffffff;
        -webkit-box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 6px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 6px 0 rgba(0, 0, 0, 0.15);
        content: "";
    }



    .slider.round {
        -webkit-border-radius: 24px;
        border-radius: 24px;
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

    .checked-mark {
        width: 12px;
        height: 9px;
        position: absolute;
        right: 5px;
        top: 5px;
        opacity: 0;
    }

    input:checked + .checked-mark {
        display: block;
        opacity: 1;
    }
</style>

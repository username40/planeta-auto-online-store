<template>
    <div class="radio-overlay">
        <input 
            type="radio" 
            class="radio" 
            name="radiot" 
            :id="this.identifier" 
            :checked="this.checked" 
            :disabled="this.disabled"/>
        <label :for="this.identifier"></label>
    </div>
</template>

<script>
export default {
    props: ['identifier', 'checked', 'disabled']
}
</script>

<style scoped>
    .radio-overlay {
        margin-top: 7px;
        margin-bottom: 11px;
    }
    .radio {
        position: absolute;
        z-index: -1;
        opacity: 0;
        margin: 10px 0 0 7px;
    }
    .radio + label {
        position: relative;
        padding: 0 0 0 35px;
        cursor: pointer;
    }
    .radio + label:before {
        content: '';
        position: absolute;
        top: -3px;
        left: 0;
        width: 24px;
        height: 24px;
        border: 1px solid #918dae;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background: #FFF;
    }
    .radio + label:after {
        content: '';
        position: absolute;
        top: 4px;
        left: 7px;
        width: 12px;
        height: 12px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background: #32377d;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.5);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.5);
        opacity: 0;
        -webkit-transition: .4s;
        -o-transition: .4s;
        transition: .4s;
    }
    .radio:checked + label:after {
        opacity: 1;
        border-color: var(--blueberry);
    }
    .radio:focus + label:before {
        -webkit-box-shadow: 0 0 0 1px var(--blueberry);
        box-shadow: 0 0 0 1px var(--blueberry)
    }

    .radio:disabled + label:after {
        background-color: #8d9aae;
    }

    .disabled {
        border: 1px solid #8d9aae!important;
        background-color: var(--milk);
    }
</style>

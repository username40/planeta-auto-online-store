<template>
    <button class="H3-White find-btn" type="submit">
        <img src="/icons/find-icon.svg" alt="иконка найти" class="find-btn__icon">
        Найти
    </button>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .find-btn {
        background-color: var(--terracota);
        border: none;
        -webkit-border-radius: 25px;
        border-radius: 25px;
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        padding-top: 12px;
        padding-bottom: 14px;
        padding-left: 70px;
        padding-right: 70px;
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color var(--animation);
        display: flex;
        align-items: center;
    }

    .find-btn__icon {
        vertical-align: bottom;
    }

    .find-btn:hover {
        background-color: var(--blueberry_lite);
    }

    .find-btn:active {
        background-color: var(--gerbera);
        box-shadow: none;
    }

    .find-btn_prime{
        padding-left: 130px;
        padding-right: 130px;
    }
</style>



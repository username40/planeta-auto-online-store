<template>
    <div class="garage-list-item">
        <app-checkbox
                :name="'garage-list-item'"></app-checkbox>
        <img src="/demo-images/garage-list-item.jpg" alt="тачка">
    </div>
</template>

<script>
    import Checkbox from '~/components/global/Checkbox'
    export default {
        name: "GarageListItem",
        components: {
            appCheckbox: Checkbox
        }
    }
</script>

<style scoped>
    .garage-list-item {
        position: relative;
        padding: 15px;
        -webkit-transform: var(--animation);
        -ms-transform: var(--animation);
        transform: var(--animation);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        max-width: 855px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .garage-list-item:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
    }

    .check {
        position: absolute;
    }
</style>
<template>
    <input type="text" class="search-form__input H3-Placeholder" placeholder="Поиск запчастей, шин, дисков и аксессуаров">
</template>


<script>
export default {
    
}
</script>

<style scoped>
    .search-form__input {
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        color: var(--just_black);
    }

    .search-form__input::-webkit-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input:-ms-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input::-ms-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input::placeholder {
        color: var(--asphalt);
    }
</style>

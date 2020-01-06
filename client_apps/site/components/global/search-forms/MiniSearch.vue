<template>
    <form action="" class="search-form">
        <div class="search-field">
            <multiselect
                    v-model="search"
                    :options="searchQuery"
                    track-by="name"
                    label="name"
                    :show-labels="false"
                    open-direction="bottom"
                    @search-change="find"
                    placeholder="Поиск запчастей, шин, дисков и аксессуаров"
                    :options-limit="6"/>
        </div>
        <button class="H2-White find-btn" type="submit">
            <img src="/icons/find-icon.svg" alt="иконка найти" class="find-btn__icon">
            Найти
        </button>
    </form>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        name: "MiniSearch",
        components: {
            Multiselect
        },
        data() {
            return {
                search: null,
                searchQuery: []
            }
        },
        methods: {
            find(query) {
                if(query.length > 3) {
                    this.$axios.get(`https://lapi.planetavto.ru/api/v1/search?q=${query}`)
                        .then(response => {
                            this.searchQuery = response.data
                        })
                    console.log(query)
                } else {
                    console.log('small')
                }

            }
        }
    }
</script>

<style scoped>
    .search-form {
        position: relative;
        z-index: 5;
        width: 100%;
    }

    .search-form__input {
        width: 100%;
        padding-left: 20px;
        padding-top: 17px;
        padding-bottom: 16px;
        padding-right: 167px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }


    .find-btn {
        background-color: var(--blueberry);
        border: none;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        padding: 10px 42px;
        position: absolute;
        z-index: 1000;
        top: 2px;
        right: 3px;
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
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }

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
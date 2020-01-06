<template>
    <div class="container">
        <multiselect
                v-model="search"
                :options="searchQuery"
                track-by="name"
                label="name"
                :show-labels="false"
                open-direction="bottom"
                @search-change="find"
                placeholder="Запрос"
                :options-limit="6"/>
        <!--                @search-change="find"-->
<!--        <p class="mt210px Body-18">{{ search.query }}</p>-->
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        name: "search",
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
        },
        // computed: {
        //     searchQuery() {
        //         try {
        //             return this.$store.getters['searchQuery/data']
        //         } catch (e) {
        //             console.log(error(e))
        //         }
        //     }
        // }
    }
</script>

<style scoped>

</style>
export const state = () => ({
    products:[],
    nextPage: null,
    total: null

})

export const mutations = {
    setProducts(state, products) {
        state.products = products
    },
    setNextPage(state, nextPage) {
        state.nextPage = nextPage
    },
    simpleMutation(state, payload) {
        state.total = payload
    },
    setNewProducts(state, newProducts) {
        state.products = [...state.products, ...newProducts];
    }
}

export const actions = {
    async fetchProducts({commit}) {
        try {
            const products = await this.$axios.$get('https://lapi.planetavto.ru/api/v1/products')
                .then((products) => {
                    commit('setProducts', products.data);
                    commit('setNextPage', products.next_page_url)
                    // console.log(products.total)
                    commit('simpleMutation', products.total)
                })
        } catch (e) {
            throw e
        }
    },

    async fetchProductById({}, productId) {
        try {
            return await this.$axios.$get(`https://lapi.planetavto.ru/api/v1/products/${productId}`)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    products: state => state.products,
    total: state => state.total
}
export const state = () => ({
    promoBanners:[]
})

export const mutations = {
    setbanners(state, promoBanners) {
        state.promoBanners = promoBanners
    }
}

export const actions = {
    async fetchpromoBanners({commit}) {
        try {
            const promoBanners = await this.$axios.$get('https://lapi.planetavto.ru/api/v1/actions')
                // .then((products) => console.log(products.data))
                .then((promoBanners) => commit('setbanners', promoBanners))
        } catch (e) {
            throw e
        }
    },

    async fetchpromoBannersById({}, promoBannerId) {
        try {
            return await this.$axios.$get(`https://lapi.planetavto.ru/api/v1/actions/${promoBannerId}`)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    banners: state => state.promoBanners
}
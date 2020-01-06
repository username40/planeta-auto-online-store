export const state = () => ({
    LinksToCategoryPage:[],
    SpecialOffers:[],
    GoodsForYourCar: [],
    SearchResLinksSlider:[]
})

export const mutations = {
    setLinksToCategoryPage(state, LinksToCategoryPage) {
        state.LinksToCategoryPage = LinksToCategoryPage
    },
    setSpecialOffers(state, SpecialOffers) {
        state.SpecialOffers = SpecialOffers
    },
    setGoodsForYourCar(state, GoodsForYourCar) {
        state.GoodsForYourCar = GoodsForYourCar
    },
    setSearchResLinksSlider(state, SearchResLinksSlider) {
        state.SearchResLinksSlider = SearchResLinksSlider
    }
}

export const actions = {
    async fetchSearchResLinksSlider({commit}) {
        try {
            const SearchResLinksSlider = await this.$axios.$get('http://localhost:3000/SearchResLinksSlider')
            commit('setSearchResLinksSlider', SearchResLinksSlider)
        } catch (e) {
            throw e
        }
    },
    async fetchSearchSearchResLinksSliderById({}, SearchResLinksSliderId) {
        try {
            return await this.$axios.$get(`http://localhost:3000/SearchResLinksSlider/${SearchResLinksSliderId}`)
        } catch (e) {
            throw e
        }
    },
    async fetchLinksToCategoryPage({commit}) {
        try {
            const LinksToCategoryPage = await this.$axios.$get('http://localhost:3000/LinksToCategoryPage')
            commit('setLinksToCategoryPage', LinksToCategoryPage)
        } catch (e) {
            throw e
        }
    },
    async fetchLinksToCategoryPageById({}, LinkToCategoryPageId) {
        try {
            return await this.$axios.$get(`http://localhost:3000/LinksToCategoryPage/${LinkToCategoryPageId}`)
        } catch (e) {
            throw e
        }
    },
    async fetchSpecialOffers({commit}) {
        try {
            const SpecialOffers = await this.$axios.$get('http://localhost:3000/SpecialOffers')
            commit('setSpecialOffers', SpecialOffers)
        } catch (e) {
            throw e
        }
    },

    async fetchSpecialOffersById({}, SpecialOffersId) {
        try {
            return await this.$axios.$get(`http://localhost:3000/SpecialOffers/${SpecialOffersId}`)
        } catch (e) {
            throw e
        }
    },
    async fetchGoodsForYourCar({commit}) {
        try {
            const GoodsForYourCar = await this.$axios.$get('http://localhost:3000/GoodsForYourCar')
            commit('setGoodsForYourCar', GoodsForYourCar)
        } catch (e) {
            throw e
        }
    },

    async fetchGoodsForYourCarById({}, GoodsForYourCarId) {
        try {
            return await this.$axios.$get(`http://localhost:3000/GoodsForYourCar/${GoodsForYourCarId}`)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    LinksToCategoryPage: state => state.LinksToCategoryPage,
    SpecialOffers: state => state.SpecialOffers,
    GoodsForYourCar: state => state.GoodsForYourCar,
    SearchResLinksSlider: state => state.SearchResLinksSlider
}
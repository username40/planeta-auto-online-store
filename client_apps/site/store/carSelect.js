export const state = () => ({
    CarBrand: []
})

export const mutations = {
    setCarBrand(state, CarBrand) {
        state.CarBrand = CarBrand
    }
}

export const actions = {
    async fetchCarBrand({commit}) {
        try {
            const CarBrand = await this.$axios.$get('http://localhost:3000/CarBrand')
            commit('setCarBrand', CarBrand)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    CarBrand: state => state.CarBrand
}
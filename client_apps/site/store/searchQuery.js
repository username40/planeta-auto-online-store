export const state = () => ({
    data: []
})

export const mutations = {
    setData(state, data) {
        state.data = data
    }
}

export const actions = {
    async fetchData({commit}) {
        try {
            const data = await this.$axios.$get('http://localhost:3000/searchQuery')
            commit('setData', data)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    data: state => state.data
}
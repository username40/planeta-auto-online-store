export const state = () => ({
    storeList:[],
    availableStores: [],
    getMyStores: null,
    whatProduct: {},
    storesOfProduct: []
})

export const mutations = {
    setProd(state, storesOfProduct) {
        state.storesOfProduct = storesOfProduct
    },
    setStoreList(state, storeList) {
        state.storeList = storeList
    },
    setAvailableStores(state, availableStores) {
        state.availableStores = availableStores;
        state.getMyStores = [];

        let allStoresList = state.storeList;
        let findStore = {}

        for (let i = 0; i < state.storeList.length; i++) {
            for(let j = 0; j < state.availableStores.length; j++) {
                if(state.storeList[i]["id"] == state.availableStores[j]) {
                    state.getMyStores.push(state.storeList[i]);
                }
            }
        }
    },
    setwhatProduct(state, whatProduct) {
        state.whatProduct = {}
        let addWhatProduct = Object.assign({}, whatProduct)
        state.whatProduct = addWhatProduct
    }
}

export const actions = {
    async fetchStoreList({commit}) {
        try {
            const storeList = await this.$axios.$get('https://lapi.planetavto.ru/api/v1/departments')
                .then((storeList) => commit('setStoreList', storeList))
                // .then((storeList) => console.log(storeList))
            // commit('setStoreList', storeList)
        } catch (e) {
            throw e
        }
    },

    async fetchStoreListById({}, storeListId) {
        try {
            return await this.$axios.$get(`https://lapi.planetavto.ru/api/v1/departments/${storeListId}`)
        } catch (e) {
            throw e
        }
    }
}

export const getters = {
    storeList: state => state.storeList,
    availableStoreList: state => state.availableStores,
    getMyStores: state => state.getMyStores,
    getWhatProduct: state => state.whatProduct,
    getstoresOfProduct: state => state.storesOfProduct
}
export const actions = {
    async nuxtServerInit({dispatch}) {
        await dispatch('products/fetchProducts')
        await dispatch('lists/fetchLinksToCategoryPage')
        await dispatch('lists/fetchSpecialOffers')
        await dispatch('lists/fetchGoodsForYourCar')
        await dispatch('lists/fetchSearchResLinksSlider')
        await dispatch('lists/fetchSearchResLinksSlider')
        await dispatch('carSelect/fetchCarBrand')
        await dispatch('storeList/fetchStoreList')
        await dispatch('searchQuery/fetchData')
        await dispatch('promobanner/fetchpromoBanners')
    }
}




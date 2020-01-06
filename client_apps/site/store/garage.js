export const state = () => ({
    carItems: [],
});

export const mutations = {
    addCarToGarage(state, carItem) {
        state.carItems.push(carItem);
    },
    removeFromGarage(state, productCart) {
        const newGarage = state.carItems.filter(item => (item.id === productCart.id) ? !item : item);

        state.cart = newGarage;
    },
};

export const getters = {
    carItems: state => state.carItems,
};

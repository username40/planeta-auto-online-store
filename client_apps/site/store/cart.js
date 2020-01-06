export const state = () => ({
    cart: [],
    viewStory: [],
    yourOrder: [],
    orderNumber: null
});

export const mutations = {
    orderNumber(state, order) {
        state.orderNumber = order
    },
    yourOrder(state, yourOrder) {
      state.yourOrder = yourOrder;
      state.cart = [];
    },
    addToCart(state, productCart) {
        let cartItem = Object.assign({}, productCart, { quantity: 1 });
        let isIncremented = false;

        state.cart.forEach(item => {
            if (item.id === cartItem.id) {
                item.quantity++;
                isIncremented = true;
            }
        });

        if (!isIncremented) {
            state.cart.push(cartItem);
        }
    },
    minusProduct(state, productCart) {
        let cartItem = Object.assign({}, productCart, { quantity: 1 });
        let isDecremented = false;
        state.cart.forEach(item => {
            if (item.id === cartItem.id) {
                item.quantity--;
                isDecremented = true;
            }
        });
    },
    removeFromCart(state, productCart) {
        const newCart = state.cart.filter(item => (item.id === productCart.id) ? !item : item);

        state.cart = newCart;
    },
    addToViewStory(state, viewStory) {
        let viewStoryItem = Object.assign({}, viewStory, { quantity: 1 });
        let isIncremented = false;

        state.viewStory.forEach(item => {
            if (item.id === viewStoryItem.id) {
                item.quantity++;
                isIncremented = true;
            }
        });

        if (!isIncremented) {
            state.viewStory.push(viewStoryItem);
        }
    }
}

export const getters = {
    cart: state => state.cart,
    viewStory: state => state.viewStory,
    yourOrder: state => state.yourOrder,
    orderNumber: state => state.orderNumber
}
<template>
    <div class="container cart mt50px">
        <div class="cart-item" v-for="(cartItem, index) in cart" :key="cartItem.id">
            <h4>{{ cartItem.name }}</h4>
            <p>{{ cartItem.price }}</p>
            <p>{{ cartItem.quantity }}</p>
        </div>
    </div>
</template>

<script>
    import { mapState } from "vuex";

    export default {
        name: "Cart",
        computed: {
            ...mapState(["cart"])
        },
        methods: {
            removeFromCart: function(index) {
                this.$store.commit("removeFromCart", index);
            },
            cleanCart: function() {
                this.$store.commit("cleanCart", this.product);
            },
            plusProduct: function(index) {
                this.$store.commit('plusProduct', index);
            },
            isAddAvaliable: function(cartItem) {
                if (cartItem.quantity >= cartItem.stock) {
                    return false;
                }
                return true;
            },
            minusProduct: function(index) {
                this.$store.commit('minusProduct', index);

                // if (cart[index].quantity < cart[index].stock) {
                //     plusBtn.removeAttribute('disabled');
                // }
            },

        }
    }
</script>

<style scoped>
    .cart {
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
</style>
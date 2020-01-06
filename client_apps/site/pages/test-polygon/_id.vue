<template>
    <div>
        <h1>{{ product.name }}</h1>

        <b>{{ product.price }}</b>
        <br>
        <p>{{ product.category }}</p>
        <br>
        <br>
        <hr>
        <div class="cart">
            <p>cart</p>
            <ul>
                <li v-for="cartItem in cartItems" :key="cartItem.id">
                    <p>Наименование: {{ cartItem.name }}</p>
                    <p>Количество: {{ cartItem.quantity }}</p>
                </li>
            </ul>
        </div>

    </div>


</template>


<script>
    export default {
        validate({params}) {
            return /^\d+$/.test(params.id)
        },
        async asyncData({params, error, store}) {
            try {
                const product = await store.dispatch('products/fetchProductById', params.id)
                return {product}
            } catch (e) {
                error(e)
            }
        },
        computed: {
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']
                } catch(e) {
                    console.log('error')
                    error(e)
                }
            }
        }
    }
</script>

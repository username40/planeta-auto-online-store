<template>
    <v-breadcrumbs :items="breadcrumbsLinks" divider=">">
        <template slot="item" slot-scope="props">
            <nuxt-link
                    :to="props.item.href"
                    class="v-breadcrumbs__item link"
                    :class="{'v-breadcrumbs__item--disabled': props.item.disabled}"
                    :disabled="props.item.disabled ? 'disabled' : ''">
                {{ props.item.text }}
            </nuxt-link>
        </template>
    </v-breadcrumbs>
</template>

<script>
    export default {
        name: "Breadcrumbs",
        data: () => ({
            breadcrumbs: []
        }),
        computed: {
            breadcrumbsLinks() {
                return this.$store.state.breadcrumbs.breadcrumbs;
            },
        },
    }
</script>

<style scoped>

</style>

<template>
    <span>{{ endingResult }}</span>
</template>

<script>
    export default {
        name: "EndingCountInStores",
        props: ['nums'],
        computed: {
            endingResult() {
                if(this.nums.toString().substr(-1) == '1') {
                    return 'e'
                } else {
                    return 'ах'
                }
            }
        }
    }
</script>

<style scoped>

</style>
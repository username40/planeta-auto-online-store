<template>
    <span>{{ endingResult }}</span>
</template>

<script>
    export default {
        props: ['nums'],
        computed: {
            endingResult() {
                if (this.nums > 20) {
                    switch (this.nums.toString().substr(-1)) {
                        case 1:
                            return ''
                            break;
                        case 2:
                            return 'а'
                            break
                        case 3:
                            return 'а'
                            break
                        case 4:
                            return 'а'
                            break
                        default:
                            return 'ов'
                    }
                } else {
                    switch (this.nums) {
                        case 1:
                            return ''
                            break;
                        case 2:
                            return 'а'
                            break
                        case 3:
                            return 'а'
                            break
                        case 4:
                            return 'а'
                            break
                        default:
                            return 'ов'
                    }
                }

            }
        }
    }
</script>
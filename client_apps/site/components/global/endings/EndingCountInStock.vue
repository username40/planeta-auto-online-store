<template>
        <span>{{ endingResult }}</span>
</template>

<script>
    export default {
        props: ['nums'],
        data() {
            return {
                // todo: запилить под другие окончания товары
                // types: [
                //     {
                //         "Штука": [
                //             'a',
                //             'и',
                //             ''
                //         ]
                //     }
                // ]
            }
        },
        computed: {
            endingResult() {
                if (this.nums > 20) {
                    switch (this.nums.toString().substr(-1)) {
                        case 1:
                            return 'а'
                            break;
                        case 2:
                            return 'и'
                            break
                        case 3:
                            return 'и'
                            break
                        case 4:
                            return 'и'
                            break
                        default:
                            return ''
                    }
                } else {
                    switch (this.nums) {
                        case 1:
                            return 'а'
                            break;
                        case 2:
                            return 'и'
                            break
                        case 3:
                            return 'и'
                            break
                        case 4:
                            return 'и'
                            break
                        default:
                            return ''
                    }
                }

            }
        }
    }
</script>
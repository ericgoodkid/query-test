<template>
    <v-card 
        class="" 
        :flat="true"
        :min-width="500"
        :max-width="860"
        >
        <BingoHeader/>
        <BingoRowItem
            v-for="(oItem, iIndex) in aBingoCard" 
            :key="iIndex"
            :a-bingo-card-item="oItem.aList"
            :a-crossed-item="aCrossedItem"
            @clickBingoItem="clickItem"
            />
    </v-card>
</template>

<script>
import BingoHeader from './BingoHeader.vue'
import BingoRowItem from './BingoRowItem.vue'
export default {
    components: {
        BingoRowItem,
        BingoHeader
    },
    props: {
        aBingoCardNumber: {
            type: Array,
            required: true
        },
        aCrossedItem: {
            type: Array,
            required: true
        }
    },
    computed: {
        aBingoCard() {
            return [
                {
                    aList: this.aBingoCardNumber.slice(0, 5)
                },
                {
                    aList: this.aBingoCardNumber.slice(5, 10)
                },
                {
                    aList: this.aBingoCardNumber.slice(10, 15)
                },
                {
                    aList: this.aBingoCardNumber.slice(15, 20)
                },
                {
                    aList: this.aBingoCardNumber.slice(20, 25)
                }
            ]
        }
    },
    methods: {
        clickItem(iNumber) {
            this.$emit('clickBingoItem', iNumber);
        }
    }
}
</script>

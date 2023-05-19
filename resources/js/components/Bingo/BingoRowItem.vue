<template>
     <v-row class="fill-height text-center mx-0 my-0">
        <BingoItem 
            v-for="(iItem, iIndex) in aBingoCardItem"
            :key="iIndex"
            :i-bingo-item="iItem"
            :a-crossed-item="aCrossedItem"
            @clickBingoItem="clickItem"
            />
    </v-row>
</template>

<script>
import BingoItem from './BingoItem.vue'
export default {
    components: {
        BingoItem 
    },
    props: {
        aBingoCardItem: {
            type: Array,
            required: true
        },
        aCrossedItem: {
            type: Array,
            required: true
        }
    },
    methods: {
        clickItem(iNumber) {
            this.$emit('clickBingoItem', iNumber);
        }
    }
}
</script>

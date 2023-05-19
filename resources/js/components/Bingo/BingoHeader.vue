<template>
    <v-row class="fill-height text-center mx-0 my-0">
        <BingoHeaderItem 
            v-for="sKey,iIndex in ['B', 'I', 'N', 'G', 'O']" 
            :key="iIndex"
            :sKey="sKey"
            />
    </v-row>
</template>

<script>
import BingoHeaderItem from './BingoHeaderItem.vue'
export default {
    components: {
        BingoHeaderItem
    },
}
</script>

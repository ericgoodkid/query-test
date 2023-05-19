<template>
    <h1 
        class="px-8 py-5 flex-grow-1 text-no-wrap bingo__item" 
        :class="bActive === true ? 'bg-green' : ''"
        @click="clickItem">
        {{ iBingoItem }}
    </h1>
</template>

<script>
export default {
    props: {
        iBingoItem : {
            required: true
        },
        aCrossedItem: {
            type: Array,
            required: true
        },
    },
    methods: {
        clickItem() {
            this.$emit('clickBingoItem', this.iBingoItem);
        }
    },
    computed: {
        bActive() {
            return this.aCrossedItem.includes(this.iBingoItem);
        }
    }
}
</script>


<style scoped>
.bingo__item {
    min-width: 172px;
    max-width: 172px;
    cursor: pointer;
    transition: background-color 0.3s ease; 
    transition: color 0.1s ease; 
}

.bingo__item:hover {
  background-color: #81C784;
  color: white;
}
</style>
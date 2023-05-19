<template>
    <div class="scrollable-container">
        <v-list 
        bg-color="blue"
        class="text-center pb-0 pt-0"
        >
            <v-list-item v-if="aDrawList.length === 0" :disabled="true">
                There's nothing here.
            </v-list-item>
            <v-list-item
                v-else
                v-for="(oItem, iIndex) in aDrawList"
                :disabled="true"
                :key="iIndex"
                :value="oItem.number"
                :class="oItem.class"
                >
                <v-list-item-title v-text="oItem.number" class="font-weight-bold"/>
            </v-list-item>
        </v-list>
    </div>
</template>

<script>
export default {
    props: {
        aDrawItem: {
            type: Array,
            required: true
        },
        aCrossedItem: {
            type: Array,
            required: true
        },
        aBingoItem: {
            type: Array,
            required: true
        },
    },
    computed: {
        aDrawList() {
            let aList = []
            for (const sNumber of this.aDrawItem.slice().reverse()) {
                let sClass = 'bg-green-lighten-2 text-black';
                if (this.aCrossedItem.includes(sNumber) === false) {
                    sClass = 'bg-yellow-lighten-2 text-black';
                }
                if (this.aBingoItem.includes(sNumber) === false) {
                    sClass = 'bg-white text-black';
                }
                
                aList.push({
                    number: sNumber,
                    class: sClass
                });
            }

            return aList;
        }
    },
    methods: {
        clickItem(iNumber) {
            this.$emit('clickBingoItem', iNumber);
        }
    }
}
</script>

<style scoped>
.scrollable-container {
  height: 495px;
  max-height: 504px; 
  overflow-y: auto; 
  scrollbar-width: thin; 
  scrollbar-color: #000 #f5f5f5;
}

.scrollable-container::-webkit-scrollbar {
  width: 8px;
}

.scrollable-container::-webkit-scrollbar-track {
  background-color: #f5f5f5; 
}

.scrollable-container::-webkit-scrollbar-thumb {
  background-color: #000;
}

.v-list-item--disabled {
    opacity: 1;
}
</style>
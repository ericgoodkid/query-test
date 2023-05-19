<template>
  <v-container class="py-8 px-6 h-100 text-center d-flex align-center justify-center w-25">
    <v-btn
        class="flex-grow-1"
        height="48"
        variant="tonal"
        @click="handleClickPlay"
      >
        Play Bingo
      </v-btn>

  </v-container>
</template>

<script>
import BingoCard from '../components/Bingo/BingoCard.vue'
export default {
  components: {
    BingoCard
  },
  methods: {
    async handleClickPlay() {
      this.$router.push({
        name: 'Play'
      });
    }
  }
}
</script>

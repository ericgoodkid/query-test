<template>
  <v-app id="inspire">
    <v-main :class="sBackgroundColor">
      <RouterView />
    </v-main>
  </v-app>
</template>

<script>
export default {
  computed: {
    sBackgroundColor() {
      if (this.$route.name === 'Welcome') {
        return 'bg-green';
      }

      return 'bg-light-blue'
    }
  }
}

</script>
    
<template>
  <v-container class="py-8 px-6" fluid>
    <v-card>
      <v-card-title>Home</v-card-title>
      <v-card-text>
        <div class="row">
          <v-text-field
          :loading="loading"
          density="compact"
          variant="solo"
          label="Enter your query here"
          append-inner-icon="mdi-magnify"
          single-line
          hide-details
          @click:append-inner="clickSearch" />
        </div>
        <div class="row">
          <v-textarea
            bg-color="grey-lighten-2"
            color="cyan"
            label="Label"/>
        </div>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    loaded: false,
    loading: false,
  }),
  methods: {
    clickSearch () {
      this.loading = true
      setTimeout(() => {
        this.loading = false
        this.loaded = true
      }, 2000)
    },
  }
}
</script>

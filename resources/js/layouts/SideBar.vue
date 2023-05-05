<template>
  <v-navigation-drawer v-model="drawer">
    <v-sheet color="grey-lighten-4" class="pa-4">
      <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

      <div>john@google.com</div>
    </v-sheet>

    <v-divider></v-divider>

    <v-list>
      <v-list-item
        prepend-icon="mdi-home"
        title="Home"
        link
        exact
        :to="{ name: 'Home' }"
      ></v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>
<script>
export default {
  data: () => ({
    drawer: null,
    links: [
      ['mdi-inbox-arrow-down', 'Create', 'CreateUsers'],
      ['mdi-inbox-arrow-down', 'Show All', 'ShowUsers']
    ]
  })
}
</script>

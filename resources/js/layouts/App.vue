<template>
  <v-app id="inspire">
    <SideBar />
    <v-main>
      <RouterView />
    </v-main>
  </v-app>
</template>
<script>
import SideBar from './SideBar.vue'
export default {
  components: {
    SideBar
  }
}
</script>
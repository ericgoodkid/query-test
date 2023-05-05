<template>
  <v-container class="py-8 px-6" fluid>
    <v-card>
      <v-card-title>Response getter</v-card-title>
      <v-card-text>
        <v-row>
          <v-col
            cols="12"
            sm="12">
            <v-text-field
              :loading="loading"
              density="compact"
              variant="solo"
              label="Enter you url including the protocol e.g https://google.com"
              append-inner-icon="mdi-magnify"
              single-line
              hide-details
              v-model="sQuery"
              @keydown.enter="handleSearch"
              @click:append-inner="handleSearch" />
          </v-col>          
        </v-row>
        <v-row>
          <v-col
            cols="12"
            sm="6">
            <v-textarea
              label="URL Response"
              auto-grow
              variant="outlined"
              rows="3"
              row-height="25"
              
              v-model="sNormalResponse"
              shaped />
          </v-col>
          <v-col
            cols="12"
            sm="6"
          >
            <v-textarea
              label="Inverted URL Response"
              auto-grow
              variant="outlined"
              rows="3"
              row-height="25"
              v-model="sInvertedResponse"
              shaped />
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
    <v-alert v-if="bError"
      class="mt-5"
      color="#C51162"
      theme="dark"
      icon="mdi-material-design"
      border
    >
      <v-row>
        <v-col cols="12">
          {{ sErrorMessage }}
        </v-col>      
      </v-row>
    </v-alert>
  </v-container>
</template>

<script>
import urlValidation from '../mixins/urlValidation';
import axios from 'axios';
export default {
  mixins: [urlValidation],
  mounted() {
    this.sQuery = this.$route.query.query ?? '';
    this.handleSearch();
  },
  data: () => ({
    sQuery: '',
    sNormalResponse: '',
    sInvertedResponse: '',
    loaded: false,
    loading: false,
    bError: false,
    sErrorMessage: ''
  }),
  methods: {
    async handleSearch () {
      // Do nothing when the query is still fetching or when the query is empty
      if (this.loading === true || this.sQuery.length === 0) {
        return;
      }
      this.$router.push({ path: '', query: { query: this.sQuery }})
      const bValidQuery = this.validateUrl(this.sQuery);
      if (bValidQuery === false) {
        this.showError();
        return;
      }

      try {
        this.loading = true;
        const oResponse = await axios.get(`/api/queries?query=${encodeURIComponent(this.sQuery)}`)
        const {normal_response, reversed_response} = oResponse.data.data;
        this.sNormalResponse = JSON.stringify(normal_response, null , 4);
        this.sInvertedResponse = JSON.stringify(reversed_response, null , 4);
      } catch (oError) {
        this.showError('The url does not return JSON');
        this.sNormalResponse = '';
        this.sInvertedResponse = '';
      } finally {
        this.loading = false;
        this.loaded = true;
      }
    },
    showError(sMessage = 'The url is invalid') {
      this.bError = true;
      this.sErrorMessage = sMessage;
      setTimeout(() => {
        this.bError = false;
      }, 3000);
    }
  }
}
</script>

<template>
  <v-container class="py-8 px-6" fluid>
    <v-card>
      <v-card-title>Number to words converter</v-card-title>
      <v-card-text>
        <v-row>
          <v-col
          class=""
            cols="12"
            sm="12">
            <v-text-field
              :bLoading="bLoading"
              density="compact"
              variant="solo"
              label="Enter the number here e.g: 123.45 or 123"
              append-inner-icon="mdi-translate"
              single-line
              hide-details
              type="text"
              v-model="sNumber"
              @keydown.enter="handleConvert"
              @click:append-inner="handleConvert" />
          </v-col>          
        </v-row>
        <v-row>
          <v-col
            cols="12"
            sm="12">
            <v-textarea
              label="Converted numbers"
              auto-grow
              variant="outlined"
              rows="3"
              row-height="25"
              v-model="sWords"
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
import validateMoney from '../mixins/moneyValidation';
import axios from 'axios';
export default {
  mixins: [validateMoney],
  mounted() {
    this.sNumber = this.$route.query.number ?? '';
    const bValidMoney = this.validateMoney(this.sNumber);
    if (bValidMoney === false) {
      this.$router.push({ path: ''});
      this.sNumber = '';
      return;
    }
    this.handleConvert();
  },
  data: () => ({
    sNumber: '',
    sWords: '',
    bLoaded: false,
    bLoading: false,
    bError: false,
    sErrorMessage: ''
  }),
  methods: {
    async handleConvert () {
      // Do nothing when the text is empty or still fetching
      if (this.bLoading === true || this.sNumber.length === 0) {
        return;
      }
      this.sNumber = parseFloat(this.sNumber).toFixed(2);
      this.$router.push({ path: '', query: { number: this.sNumber }})
      const bValidMoney = this.validateMoney(this.sNumber);
      if (bValidMoney === false) {
        this.sWords = '';
        this.showError();
        return;
      }

      try {
        this.bLoading = true;
        const oResponse = await axios.get(`/api/queries?amount=${this.sNumber}`)
        const {words} = oResponse.data.data;
        this.sWords = words;
      } catch (oError) {
        this.sWords = '';
        this.showError();
      } finally {
        this.bLoading = false;
        this.bLoaded = true;
      }
    },
    showError(sMessage = 'Invalid amount') {
      this.bError = true;
      this.sErrorMessage = sMessage;
      setTimeout(() => {
        this.bError = false;
      }, 3000);
    }
  }
}
</script>
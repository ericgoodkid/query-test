<template>
  <v-container class="py-8 px-6 h-100">
    <v-row class="justify-center align-center h-100" v-if="bBingoLoading === false">
      <v-col :cols="6">
        <BingoCard 
          :a-bingo-card-number="aBingoCardItem"
          :a-crossed-item="aCrossedItem"
          @clickBingoItem="handleClickBingoItem"
          />
      </v-col>
      <v-col :cols="3">
        <v-btn @click="handleClickDrawNumber" class="bg-green w-100" :rounded="false">
          Draw Number
        </v-btn>
        <DrawList
          :a-draw-item="aBingoDraw"
          :a-crossed-item="aCrossedItem"
          :a-bingo-item="aBingoCardItem"
          />
      </v-col>
    </v-row>
    <v-row justify="center" align="center" style="height: 100vh;" v-else>
      <v-col cols="12" class="d-flex align-center justify-center">
        <v-progress-circular
          indeterminate
          color="green-lighten-1"
        ></v-progress-circular>
      </v-col>
    </v-row>
    
    <div class="floating-button" v-if="bBingoLoading === false">
      <v-btn density="compact" icon="mdi-autorenew" size="x-large" title="Reset Bingo" @click="handleClickCreateBingo"></v-btn>
    </div>

    <v-snackbar
      v-model="bAlert"
      :timeout="2000"
      >
      {{ sAlertMessage }}
      <template v-slot:actions>
        <v-btn
          color="light-green"
          variant="text"
          @click="bAlert = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<script>
import BingoCard from '../components/Bingo/BingoCard.vue'
import DrawList from '../components/Bingo/DrawList.vue'
import axios from 'axios';
export default {
  components: {
    BingoCard,
    DrawList
  },
  async mounted() {
    await this.handleClickCreateBingo();
  },
  data() {
    return {
      bBingoLoading: true,
      aRawBingoCardItem: [],
      aBingoCardItem: [],
      aBingoDraw: [],
      aCrossedItem: [],
      bShowCard: false,
      mBingoNo: null,
      bAlert: false,
      sAlertMessage: ''
    }
  },
  computed: {
    aTest() {
      return this.aRawBingoCardItem.reduce((oResult, oItem) => {
        if (oResult[oItem.item]) {
          oResult[oItem.item].push(oItem.value);
        } else {
          oResult[oItem.item] = [oItem.value];
        }
        return oResult;
      }, {});
    },
    bWinFlag() {
      if (this.aBingoDraw.length < 5) {
        return false;
      }

      const aCombinedItem = this.aRawBingoCardItem.reduce((oResult, oItem) => {
        if (oResult[oItem.item]) {
          oResult[oItem.item].push(oItem.value);
        } else {
          oResult[oItem.item] = [oItem.value];
        }
        return oResult;
      }, {});

      let bFirstKeyFlag = false,
          bSecondKeyFlag = false,
          bThirdKeyFlag = false,
          bFourthKeyFlag = false,
          bFifthKeyFlag = false;
      for (let iCrossedItem of this.aCrossedItem) {
        if (aCombinedItem['B'].includes(iCrossedItem) === true) {
          bFirstKeyFlag = true;
        }

        if (aCombinedItem['I'].includes(iCrossedItem) === true) {
          bSecondKeyFlag = true;
        }

        if (aCombinedItem['N'].includes(iCrossedItem) === true) {
          bThirdKeyFlag = true;
        }

        if (aCombinedItem['G'].includes(iCrossedItem) === true) {
          bFourthKeyFlag = true;
        }

        if (aCombinedItem['O'].includes(iCrossedItem) === true) {
          bFifthKeyFlag = true;
        }

      }

      return bFirstKeyFlag === true && bSecondKeyFlag === true  && bThirdKeyFlag === true  && bFourthKeyFlag === true  && bFifthKeyFlag === true ;
    },
  },
  methods: {
    async handleClickBingoItem(iNumber) {
      try {
        if (this.aBingoDraw.includes(iNumber) === false) {
          this.showAlert('Sorry but the number is not yet drawn.');
          return;
        } else if (this.aCrossedItem.includes(iNumber) === true) {
          // Do nothing when it is already in the list
          return;
        } else if (this.bWinFlag === true) {
          this.showAlert('Bruh, you already win.')
          return;
        }

        await this.crossedOutItem(this.mBingoNo, iNumber)
        this.aCrossedItem.push(iNumber);
        if (this.bWinFlag === true) {
          this.showAlert('Congratulation, You win!')
        }
      } catch (oError) {
        this.showAlert(this.getErrorMessage(oError.response))
      }
    },
    showAlert(sAlertMessage) {
      this.bAlert = true;
      this.sAlertMessage = sAlertMessage;
    },
    getErrorMessage(oResponse) {
      return oResponse.data.errors.value[0]
    },
    async handleClickCreateBingo() {
      try {
        this.resetBingo();
        this.bBingoLoading = true;
        const oResponse = await this.createBingoCard();
        this.mBingoNo = oResponse['bingo_no'];
        this.aRawBingoCardItem = oResponse['bingo_item'];
        this.aBingoCardItem = this.getBingoCardItems(oResponse['bingo_item']);
        this.aBingoDraw = this.getBingoDraws(oResponse['bingo_draw']);
      } catch (oError) {
        this.showAlert(this.getErrorMessage(oError.response));
      } finally {
        this.bBingoLoading = false;
        this.bShowCard = true;
      }
    },
    async handleClickDrawNumber() {
      try {
        this.bDrawLoading = true;
        const oResponse = await this.drawBingoNumber(this.mBingoNo);
        this.aBingoDraw.push(oResponse['value']);
      } catch (oError) {
        this.showAlert(this.getErrorMessage(oError.response));
      } finally {
        this.bDrawLoading = false;
        this.bShowCard = true;
      }
    },
    getBingoCardItems (aBingoCardItem) {
      let aCombinedItem = [];
      for (const oItem of aBingoCardItem) {
        const {value: iValue} = oItem;
        aCombinedItem.push(iValue);
      }

      let aNewBingoCardItem = [];
      for (let iColumn = 0; iColumn < 5; iColumn++) {
        for (let iRow = 0; iRow < 5; iRow++) {
          const iIndex = iColumn + iRow * 5;
          aNewBingoCardItem.push(aCombinedItem[iIndex]);
        }
      }

      return aNewBingoCardItem;
    },
    getBingoDraws (aBingoDraw) {
      let aDraws = [];
      for (const oItem of aBingoDraw) {
        const {value: iValue} = oItem;
        aDraws.push(iValue);
      }

      return aDraws;
    },
    resetBingo() {
      this.aBingoCardItem = [];
      this.aBingoDraw = [];
      this.aCrossedItem = [];
      this.mBingoNo = null;
    },
    async fetchBingoCard (iBingoNo) {
      const oResponse = await axios.get(`/api/bingos/${iBingoNo}`)
      return oResponse.data.data;
    },
    async drawBingoNumber (iBingoNo) {
      const oResponse = await axios.post(`/api/bingos/${iBingoNo}/draws`)
      return oResponse.data.data;
    },
    async createBingoCard () {
      const oResponse = await axios.post(`/api/bingos`)
      return oResponse.data.data;
    },
    async crossedOutItem (iBingoNo, iNumber) {
      const oResponse = await axios.put(`/api/bingos/${iBingoNo}/crossout/${iNumber}`)
      return oResponse.data.data;
    }
  }
}
</script>

<style scoped>
.floating-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
}
</style>
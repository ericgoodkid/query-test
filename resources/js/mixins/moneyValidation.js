export default {
  methods: {
    validateMoney(fAmount) {
      fAmount = fAmount.replace(',', '').trim();
      return !isNaN(fAmount);
    }
  }
}
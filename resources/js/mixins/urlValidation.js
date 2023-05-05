export default {
  methods: {
    validateUrl(sUrl) {
      if (!sUrl) {
        return false; // URL is null or empty
      }

      try {
        const oUrl = new URL(sUrl);
        return oUrl.protocol === 'http:' || oUrl.protocol === 'https:';
      } catch (oError) {
        return false; // URL is invalid
      }    
    }
  }
}
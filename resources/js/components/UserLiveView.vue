<template>
  <div>
    <h1>Direct en cours</h1>
    <div v-if="isLive">
      <p>Le direct est en cours. Regardez ci-dessous :</p>
      <video ref="videoElement" autoplay></video>
    </div>
    <div v-else>
      <p>Il n'y a actuellement aucun direct en cours.</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLive: false
    };
  },
  mounted() {
    this.checkStreamStatus();
  },
  methods: {
    async checkStreamStatus() {
      try {
        const response = await axios.get('/check-stream-status');
        this.isLive = response.data.status === 'live';
      } catch (error) {
        console.error('Erreur lors de la vérification du statut du direct:', error);
      }
    }
  }
}
</script>

<template>
  <div>
    <h1>Gestion du Direct</h1>
    <button @click="startStream">Lancer le Direct</button>
    <button @click="stopStream">Arrêter le Direct</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  methods: {
    async startStream() {
      try {
        await axios.post('/start-stream');
        alert('Direct lancé avec succès');
      } catch (error) {
        console.error('Erreur lors du lancement du direct:', error);
      }
    },
    async stopStream() {
      try {
        await axios.post('/stop-stream');
        alert('Direct arrêté avec succès');
      } catch (error) {
        console.error('Erreur lors de l\'arrêt du direct:', error);
      }
    }
  }
}
</script>

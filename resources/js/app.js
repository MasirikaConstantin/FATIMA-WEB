import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';
import AdminLiveControl from './components/AdminLiveControl.vue';


window.Alpine = Alpine;
createApp({
    components: {
        AdminLiveControl
    }
}).mount('#app'); 

Alpine.start();

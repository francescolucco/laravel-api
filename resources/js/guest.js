window.axios = require('axios');
window.Vue = require('vue');

// qui per prima cosa importo il file App.vue creato dentro la cartella resource/js/components
import App from './App.vue'

// dopodichè devo iniettare dentro all'elemento js new Vue che fa riferimento al div#app presente in home.blade il file file App.vue con la seguente formula da imparare a memoria --- render: h => h(App)  ----
const app = new Vue({
    el: '#app',
    render: h => h(App)
});

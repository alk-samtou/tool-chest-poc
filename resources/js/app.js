require('./bootstrap');
require('alpinejs');
import Cookies from 'js-cookie'

import { QuillEditor } from '@vueup/vue-quill'
// import '@vueup/vue-quill/dist/vue-quill.core.css';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

window.getPreferredFilesView = function () {
    // grid or table
    const defaultValue = 'grid';

    if (Cookies.get('getPreferredFilesView') === undefined) {
        Cookies.set('getPreferredFilesView', defaultValue, {expires: 365});
        return defaultValue;
    }
    return Cookies.get('getPreferredFilesView');
}

window.updatePreferredFilesView = function (newView) {
    Cookies.remove('getPreferredFilesView');
    Cookies.set('getPreferredFilesView', newView, {expires: 365});
}

import {createApp} from 'vue';
import VueClickAway from "vue3-click-away";

const app = createApp({});
app.use(VueClickAway);
app.component('QuillEditor', QuillEditor);

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => app.component(key.split('/').pop().split('.')[0], files(key).default))

app.mount('#app');





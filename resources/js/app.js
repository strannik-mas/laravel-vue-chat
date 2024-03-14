import './bootstrap';

import Alpine from 'alpinejs';

import { createApp } from 'vue/dist/vue.esm-bundler';
import HelloVue from './components/HelloVue.vue';
import PropComponent from './components/PropComponent.vue';
import AjaxComponent from './components/AjaxComponent.vue';
import SocketChatComponent from './components/SocketChatComponent.vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({
    components: {
        'hello-vue' : HelloVue,
        'prop-component' : PropComponent,
        'ajax-component' : AjaxComponent,
        'socket-chat-component' : SocketChatComponent,
    }
});

app.mount('#app');

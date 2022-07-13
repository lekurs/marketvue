import '../bootstrap';
import router from './router'
import {createApp} from 'vue/dist/vue.esm-bundler';

const app = createApp({

});

app.use(router)
    .mount('#app')

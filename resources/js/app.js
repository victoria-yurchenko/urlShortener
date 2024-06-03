
import { createApp } from 'vue';
import UrlShortener from './components/UrlShortener.vue';

const app = createApp({});
app.component('url-shortener', UrlShortener);
app.mount('#app');

import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp,Head,Link } from '@inertiajs/vue3';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import Layout from './Layout/Layout.vue';
import FontAwesomeIcon from './Icons/Icons.js'
createInertiaApp({
    resolve: name => {
        let pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
})

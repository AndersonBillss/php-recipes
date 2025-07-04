import '../css/app.css';

import { createApp, h } from 'vue';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createInertiaApp } from '@inertiajs/vue3';
import type { DefineComponent } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import axios from 'axios';
import AppLayout from './layouts/AppLayout.vue';
import { createPinia } from 'pinia';

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

declare global {
    interface ImportMetaEnv {
        readonly VITE_APP_NAME: string;
        [key: string]: string | boolean | undefined;
    }     
    interface ImportMeta {
        readonly env: ImportMetaEnv;
    }
}

const appName = import.meta.env.VITE_APP_NAME || 'Recipes';
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        return resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue'))
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({
            render: () => h(AppLayout, {}, {
                default: () => h(App, props)
            })
        });
        const pinia = createPinia()

        app.use(plugin)
           .use(ZiggyVue)
           .use(pinia)
           .mount(el);
    },
});
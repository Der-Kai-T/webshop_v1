import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/custom_frontend.js',
                'resources/css/admin_customization.css',
                'resources/js/custom.js',
            ],
            refresh: [{
                paths: ['resources/**', 'config/**', 'app/Http/Controllers/**'],
                config: { delay: 300 }
            }]
        }),
    ],
});

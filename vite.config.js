import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';
export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/custom_frontend.js',
                'resources/css/admin_customization.css',
                'resources/js/custom.js',
                'resources/js/backend.js',
            ],
            refresh: [{
                paths: ['resources/**', 'config/**', 'app/Http/Controllers/**'],
                config: { delay: 300 }
            }]
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~admin-lte': path.resolve(__dirname, 'node_modules/admin-lte'),
            '~bootstrap-icons': path.resolve(__dirname, 'node_modules/bootstrap-icons'),
        }
    },
});

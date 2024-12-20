import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Specify exact CSS file
                'resources/js/app.js',   // Specify exact JS file
            ],
            refresh: true,
        }),
    ],
});


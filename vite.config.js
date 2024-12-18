import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/*.css', // Includes all CSS files in the folder
                'resources/js/*.js',   // Includes all JS files in the folder
            ],
            refresh: true,
        }),
    ],
});

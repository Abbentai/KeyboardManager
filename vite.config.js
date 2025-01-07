import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    //This is for adding the google material library via npm
    resolve: {
        alias: {
            '@material/web': resolve(__dirname, 'node_modules/@material/web'),S
        },
    },
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/home/flex-slider.css', 'resources/css/home/owl.css', 
                    'resources/css/home/fontawesome.css', 'resources/css/home/style.css', 'resources/js/home/accordions.js', 'resources/js/home/custom.js',
                    'resources/js/home/owl.js', 'resources/js/home/slick.js' ],
            refresh: true,
        }),
    ],
});

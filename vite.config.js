import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',  
            ],
            refresh: true,
        }),

        copy({
            targets: [
                {
                    src: [
                        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                        'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                        'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
                        'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
                        'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js'
                    ],
                    dest: 'public/vendor/datatables/js/'
                },
                {
                    src: [
                        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                        'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                        'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'
                    ],
                    dest: 'public/vendor/datatables/css/'
                },
            ]
        })
    ],
});
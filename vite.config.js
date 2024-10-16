import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { loadEnv } from 'vite';

export default defineConfig(({ mode }) => {
    // Load environment variables from .env file
    const env = loadEnv(mode, process.cwd());

    return {
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
        define: {
            'process.env': {
                VITE_PUSHER_APP_KEY: env.VITE_PUSHER_APP_KEY,
                VITE_PUSHER_APP_CLUSTER: env.VITE_PUSHER_APP_CLUSTER
            }
        }
    };
});

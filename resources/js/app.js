import './bootstrap';

import Alpine from 'alpinejs';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Alpine = Alpine;

Alpine.start();
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('customers')
    .listen('CustomerUpdated', (event) => {
        console.log('Customer Updated:', event.customer);
        
    })
    .listen('CustomerAdded', (event) => {
        console.log('Customer Added:', event.customer);
        
    })
    .listen('CustomerDeleted', (event) => {
        console.log('Customer Deleted:', event.customer);
        
    });

import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'fkvo02hvlofirqbq1wkf',
//     cluster: '',
//     wsHost: 'localhost',
//     wsPort: 8080,
//     wssPort: 8080,
//     forceTLS: false,
//     enabledTransports: ['ws', 'wss']
// });

// window.Echo.channel('message-channel') // Ganti dengan channel yang sesuai
//     .listen('NotificationEvent', (event) => {
//         console.log('New message received: ', event);
//         updateMessageCount();
//     });

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';

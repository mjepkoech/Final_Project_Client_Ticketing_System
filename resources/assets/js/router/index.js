import Router from 'vue-router';
import Vue from 'vue';


import Landing from '../components/partials/landing.vue';


import Ticket from '../components/tickets/create.vue';
import User_ticket from '../components/tickets/user_ticket.vue';



Vue.use(Router);

const router = new Router({
    routes: [

        {
            name: 'landing',
            path: '/',
            component: Landing
        },
        {
            name: 'ticket',
            path: '/ticket/create',
            component: Ticket
        },
        {
            name: 'user_ticket',
            path: '/ticket/user_ticket',
            component: User_ticket
        },

        {
            name: 'show',
            path: '/ticket/1',
            component: User_ticket
        }
    ]
});

export default router;
import Router from 'vue-router';
import Vue from 'vue';


import Landing from '../components/partials/landing.vue';


import Ticket from '../components/tickets/create.vue';
import User_ticket from '../components/tickets/user_ticket.vue';
import Show from '../components/tickets/show.vue';



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
            path: '/ticket/edit_ticket/:id',
            component: Show
        }
    ]
});

export default router;
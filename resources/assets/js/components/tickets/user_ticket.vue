<script>
    import Vue from 'vue';
    import Vuex from 'vuex';

    Vue.use(Vuex);

    export default{
        data(){
            return{
                tickets: []
            }
        },
        created: function()
        {
            this.fetchTickets();
        },
        methods: {
            fetchTickets(){
                console.log(this.title)
                    axios.get('/user_tickets').then((response) => {
                        console.log(response, 'title');
                        this.tickets = response.data.data;
                    });

            }
        }
    }
</script>
<template>
    <div class="row">
        <div class="row expanded app-dashboard-top-nav-bar">
            <div><h5>My Issues</h5></div>
        </div>
        <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>
            <form>
             <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(ticket, index) in tickets" :key="ticket.id">
                        <td>
                            <router-link :to="{ name: 'show', params: { id: ticket.id } }">
                                {{ ticket.title }}
                            </router-link>
                        </td>
                        <td>

                            <span v-if="ticket.status == 'Pending'" class="alert button">{{ ticket.status }}</span>
                            <span v-else class="success button">{{ ticket.status }}</span>
                        </td>
                        <td>
                            {{ ticket.updated_at }}
                        </td>
                    </tr>

                    </tbody>
                </table>
            </form>
            </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';


    export default {
        data(){
            return { ticket: {}, comment: [] }
        },

        computed: {
            ticketId(){
                return this.$route.params.id;
            },
            comments() {
                try
                {
                    if(this.comment.length > 0) return this.ticket.comment;
                } catch(err) { console.log("there is an error");}
                return [];
            }
        },

        watch: {
            ticket: {
                handler: function ()
                {
                    console.log(this.ticket.comment);
                }
            }
        },

        methods: {
            getTicketDetails: function ()
            {
                axios.get('/tickets/' + this.ticketId).then((response) => {
                    this.ticket = response.data.ticket;
                    this.comment = response.data.comment;
                }, function () {
                    console.log("error");
                });
            },
        },

        mounted() {
            this.getTicketDetails();
        }
    }
</script>

<template>
    <div class="row">
        <div class="panel callout primary">
            <div>
                <div class="ticket-info">
                    <p><b>Title: </b>{{ ticket.title }}</p>
                    <hr>

                    <p><b>Description: </b>{{ ticket.message }}</p>
                    <hr>

                    <p><b>Ticket Number: </b>{{ ticket.ticket_id }}</p>
                    <hr>

                    <p><b>Last updated: </b>
                        {{ ticket.updated_at }}
                    </p>
                    <hr>

                    <p><b>Status: </b></p>
                    <p>
                    <span v-if="ticket.status == 'Pending'" class="alert button">{{ ticket.status }}</span>
                    <span v-else>
                        <span class="success button"> {{ ticket.status }} </span>
                        <br/>
                        <hr>
                        <span v-if="comments">
                            <template v-for="comment in comments">
                                <b>Closing Comments: </b>{{ comment.comment }}
                            </template>
                        </span>
                    </span>

                    </p>
                 </div>
            </div>
        </div>
    </div>
</template>



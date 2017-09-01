<script>
    import Vue from 'vue';
    import Vuex from 'vuex';
    import axios from 'axios';

    Vue.use(Vuex);

    export default{

        data(){
            return{
                ticket: {}
            }
        },

        computed: {

            ticketId(){

                return this.$route.params.id;
            }
        },

        methods: {
            getTicketDetails: function ()
            {
                axios.get('/tickets/' + this.ticketId).then((response) => {
                    this.ticket = response.data;
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
                <div class="panel callout secondary"><p><center><b>{{ ticket.title }}</b></center></p>
                </div>

            <div class="ticket-info">
                <p><b>Description: </b>{{ ticket.message }}</p>
                <!--<p>Categry: {{ $category->name }}</p>-->
                <div>
                    <p><b>Status: </b></p>
                    <p>
                    <span v-if="ticket.status == 'Pending'" class="alert button">{{ ticket.status }}</span>
                    <span v-else class="success button">{{ ticket.status }}</span>
                </p></div>
                <p><b>Created on: </b>{{ ticket.updated_at }}</p>
            </div>

            <hr>

            <div class="comment-form">
                <form action="" method="POST" class="form">

                    <div>
                        <p><b>Message: </b></p>
                        <textarea rows="5" id="comment" class="form-control" name="comment"></textarea>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</template>



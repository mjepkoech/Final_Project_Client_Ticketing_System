<script>
    import Vue from 'vue';
    import Vuex from 'vuex';

    Vue.use(Vuex);

    export default{
        data(){
            return{
                ticket: []
            }
        },
        created: function()
        {
            this.show();
        },
        methods: {
            show(){
                console.log(this.title)
                axios.get('tickets/{ticket_id}').then((response) => {
                    console.log(response);
                    this.ticket = response.data.data;
                });

            }
        }
    }
</script>
<template>
    <div class="row">
        <div class="panel callout radius">
            <div>
                {{ ticket.title }}
            </div>

            <div class="ticket-info">
                <p>{{ ticket.message }}</p>
                <p>Categry: {{ $category->name }}</p>
                <p>
                    Status: <span v-if="ticket.status == 'Pending'" class="alert button">{{ ticket.status }}</span>
                    Status: <span v-else class="success button">{{ ticket.status }}</span>
                </p>
                <p>Created on: {{ ticket.updated_at }}</p>
            </div>

            <hr>

            <div class="comment-form">
                <form action="" method="POST" class="form">
                    {!! csrf_field() !!}

                    <input type="hidden" name="ticket_id" value="">

                    <div>
                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>



<script>
    import Vue from 'vue';
    import Vuex from 'vuex';

    import { mapGetters } from 'vuex';

    Vue.use(Vuex);

    export default {
        data() {
            return {
//                form: {
                    title: '',
                    message: '',
                    category: '',
                    priority: '',

//                }
            }
        },

        computed: {
            ...mapGetters({
                categories: 'categories'
            })
        },

        methods: {

            getCategories: function ()
            {
                this.$store.commit('GET_CATEGORIES');
            },
            saveIssue () {
                console.log(this.title)
                axios.get('/new_ticket/add',{
                params: {
                    title: this.title,
                    message: this.message,
                    category: this.category,
                    priority: this.priority,
                }
                }).then((response) => {
                    console.log(response);
                    }
                )
            }
        },

        mounted() {
            this.getCategories();
        }
    }
</script>

<template>
    <div class="">
        <h3>Create issue here</h3>
        <form @submit.prevent="saveIssue()">

            <div>
                <label for="title">Title</label>

                <div>
                    <input v-model="title" id="title" type="text" name="title" placeholder="Enter Title">
                </div>
            </div>
            <div>
             <label for="category">Category</label>
                <div>
                    <select id="category" type="category" name="category" v-model="category">
                        <option value="">Select Category</option>
                            <option v-for="cat in categories" :value="cat.id"> {{ cat.name }} </option>
                    </select>
                </div>
            </div>

            <div>
                <label for="priority">Priority</label>

                <div>
                    <select v-model="priority" id="priority" type="" name="priority">
                        <option value="">Select Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="message">Description</label>

                <div>
                    <textarea v-model="message" rows="5" id="message" class="form-control" name="message"></textarea>

                </div>
            </div>

            <div>
                <button type="submit" class="button">
                    <i class="fa fa-btn fa-ticket"></i> Submit Ticket
                </button>
            </div>
        </form>
    </div>
</template>
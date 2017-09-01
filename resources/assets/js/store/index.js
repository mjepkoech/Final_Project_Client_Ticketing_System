import Vue from 'vue';
import Vuex from 'vuex';
import * as config from '../config/index'


Vue.use(Vuex);

const state = {
    categories: {},
};

const getters = {
    categories: state => state.categories,
};

const mutations = {

    GET_CATEGORIES(state) {

        config.getCategory().then(function ({data})
        {
            state.categories = data;
        }, function () {
            console.log("error");
        });
    }
};

const actions = {

};

const store = new Vuex.Store(
    {
        state, getters, mutations, actions
    }
);


export default store;
require('./bootstrap');
import Vue from 'vue';

Vue.component('question', require('./components/Question.vue').default);

new Vue({
    el: '#root'
})
<template>
    <div>
        <h1 v-text="question.title"></h1>+
        <div class="body" v-text="question.body"></div>
    </div>
</template>

<script>
    export default {
        props: ['question'],

        components: {},

        data() {
            return {
                
            }
        },

        computed: {
            
        },

        methods: {
            
        }
    }
</script>
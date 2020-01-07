<template>
    <div>
        <div>
            <span>{{ remaining.days() }} Days, </span>
            <span>{{ remaining.hours() }} Hours, </span>
            <span>{{ remaining.minutes() }} Minutes, </span>
            <span>{{ remaining.seconds() }} Seconds </span>
            left...
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['until'],

        components: {},

        computed: {
            remaining () {
                let remaining = moment.duration(Date.parse(this.until) - this.now);
                console.log(remaining);

                return {
                    days: remaining.days(),
                    hours: remaining.hours(),
                    minutes: remaining.minutes(),
                    seconds: remaining.seconds()
                }
            }
        },

        data () {
            return { now: new Date() };
        },

        computed: {
            
        },

        methods: {
            
        }
    }
</script>
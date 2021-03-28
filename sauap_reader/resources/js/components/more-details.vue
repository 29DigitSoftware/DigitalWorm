<template>
    <span 
        class="more"
        @click="routingBetween(path, id)"
    >
        толығырақ
    </span>
</template>

<script>
    import routingBetween from '../mixins';
    export default {
        data(){
            return {
            };
        },
        
        props: {
            id: {
                default: -1,
            },
            path: {
                default: ''
            }
        },
        mixins: [
            routingBetween,
        ],
    }
</script>

<style scoped>
    .more,
    .more:visited,
    a:active {
        float: right;
        margin-right: 16px;
        text-align: left;
        font: Condensed Bold 10px/10px 'Nunito', sans-serif;
        font-size: 12px;
        letter-spacing: 0px;
        color: #3C6E71;
        text-transform: lowercase;
        opacity: 1;
        text-decoration: none;
    }

    .more:hover, 
    .more:focus{
        color: #000;
    }
</style>
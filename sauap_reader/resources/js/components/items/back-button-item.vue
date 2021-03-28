<template>
    <button 
        type="button" 
        class="btn btn-link"
        :class="color"
        @click="goBack()" 
    >
        <i class="fa fa-chevron-left"></i>
    </button>
</template>

<script>

    export default {
        data(){
            return {
            };
        },
        props: {
            color: {
                type: String,
                default: 'white'
            },
            goTo: {
                default: -1
            }
        },

        methods: {
            goBack: function(){
                if( this.goTo === -1 )
                    this.$router.go(-1);
                else
                    this.$router.push(this.goTo);
            },
        },
        
    }
</script>

<style scoped>
    button {
        color: #2F3138;
        font-size: 20px;
        margin: 0;
        padding: 0;
    }
</style>

<template>
    <button 
        type="button" 
        class="btn btn-link"
        :class="color"
        @click="openProfile()" 
    >
        <i v-if="isAuthorized" class="fa fa-user"></i>
        <i v-else class="fa fa-sign-in-alt"></i>
    </button>
</template>

<script>
    import { mapGetters } from 'vuex';

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
        },
        computed: {
            ...mapGetters(['isAuthorized']),
        }, 
        methods: {
            openProfile(){
                console.log('something')
                console.log(this.$store.getters.isAuthorized)
                if( this.$store.getters.isAuthorized ) 
                    this.$router.push('profile');
                else 
                    this.$router.push('login')
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

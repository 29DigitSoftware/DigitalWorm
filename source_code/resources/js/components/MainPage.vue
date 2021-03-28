<template>

    <div >

        <landing-header />

        <features />

        <demonstration />
        
        <pricing-table :goBackButton="false" />

        <landing-footer />

    </div>
    
</template>

<script>
    import landingHeader from '../components/landingHeader'
    import features from '../components/features'
    import demonstration from '../components/demonstration'
    import pricingTable from '../components/pricingTable'
    import landingFooter from '../components/landingFooter'

    import '../assets/Landing/assets/vendors/bootstrap/js/bootstrap.min.js'
    import '../assets/Landing/assets/js/app.js'
    import '../assets/Landing/assets/js/plugins.min.js'

    import { mapGetters } from 'vuex'
    // import '../assets/Landing/assets/js/modernizr-2.6.2.min.js'

    export default {
        data(){
            return {
            };
        },
        created() {
            if( this.isAuthorized ){
                this.$router.push('catalog')
            }
            else{
                console.log('Not authorized')
            }
        },
        components: {
            landingHeader,
            features,
            demonstration,
            pricingTable,
            landingFooter
                
        },
        computed: {
            ...mapGetters(['isAuthorized']),
        },
    }

</script>

<style scoped>

    /* @import '../assets/Landing/assets/vendors/bootstrap/css/bootstrap.min.css'; */
    @import '../assets/Landing/assets/css/plugins.min.css';
    @import '../assets/Landing/assets/css/style.css';

</style>
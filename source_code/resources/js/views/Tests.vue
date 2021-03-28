<template>
    <div class="wrapper">
        <div class="">
            <customHeader 
                :title='Section.title'    
            />
            <div 
                class="tests_container"
            >   
                <div 
                    class="tests_container_item" 
                    v-for="(test, index) in Section.body" 
                    :key="index" 
                >
                    <testItem :test="test" :index="index"></testItem>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import customHeader from '../components/custom-header';
    import testItem from '../components/items/test-item';
    import fetchData from '../mixins'

    import { mapGetters } from 'vuex'

    export default {
        data(){
            return {
                title: 'Loading',
            };
        },

        components: {
            testItem,
            customHeader
        },

        mixins: [fetchData],
        computed: {
            ...mapGetters(['Section', 'isSectionLoaded']),
        }, 
        created(){
            if( !this.isSectionLoaded )
                this.fetchData(this.$route.query.id);
        },
        
    }

</script>

<style scoped>

    .tests_container {
        display: flex;
        
        padding-right: 15px;
        padding-left: 15px;
        margin: 0;

        flex-flow: row wrap;
        justify-content: space-between;
    }

    .tests_container_item {

        flex-grow: 0;
        flex-basis: 47.5%;

        height: 256px;

        margin-bottom: 20px;

    }

    /deep/ .test_content {
        height: 100%;
        width: 100%;
        
        justify-content: center;

        border-radius: 5px;
    }

    /deep/ .test_content .test_content_img {
        margin-top: 0;
        height: 80px;
        margin-bottom: 48px;
    }

    /deep/ .test_content .test_content_title {
        font-size: 19px;
    }

    /deep/ .test_content .test_content_progress {
        font-size: 17px;
    }

    /deep/ .test_content .test_content_start {
        margin-top: 5px;
        font-size: 12px;
        width: 96px;
        height: 30px;    
    }

</style>
<template>
    <div class="wrapper">
        <custom-header 
            :title='title'
        />

        <div 
            v-if='isValid(Section.body)'
        >
            <div
                v-for="author in Section.body"
                :key="author.id"
            >
                <author :Content="author" />
            </div>
        </div>

        <div v-else>
            <div
                v-for="placeholder in 3"
                :key="placeholder"
            >
                <author />
            </div>
        </div>

    </div>
</template>

<script>

    import HorizontalAuthorInfo from '../components/section-items/HorizontalAuthorInfo';
    import CustomHeader from '../components/custom-header';
    import fetchData from '../mixins'
    import isValid from '../mixins'

    import { mapGetters } from 'vuex'

    export default {
        data(){
            return {
                title: "Авторлар",
            };
        },
        
        components: {
            'author': HorizontalAuthorInfo,
            CustomHeader
        },

        mixins: [fetchData, isValid],
        computed: {
            ...mapGetters(['base_url', 'Section', 'isSectionLoaded']),
        }, 
        created(){
            if( !this.isSectionLoaded )
                this.fetchData(this.$route.query.id);
        },
    }

</script>

<style scoped>

    .wrapper {
        padding: 0;
    }

    .book_container {
        margin: 0 0 0 0px;
        overflow-x: hidden;
    }

    .row {
        margin-bottom: 3%;
    }
</style>
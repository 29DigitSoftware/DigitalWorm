<template>
    <div v-if="isValid(Content)">
        <book-info
            v-for="book in Content" 
            :key="book.id"  
            :Content="book"
            v-on:click="routingBetween('book_info', book.id)"
        >
        </book-info>
    </div>

    <!-- <div v-else-if="isEmpty(Content)">

        <p class="first-text font-weight-bold"> Kitap joq! </p>
        
    </div> -->

    <div v-else>
        <book-info
            v-for="placeholder in 3" 
            :key="placeholder"  
        >
        </book-info>
    </div>

</template>

<script>

    import routingBetween from '../mixins'
    import isValid from '../mixins'
    import isEmpty from '../mixins'

    export default {
        data(){
            return { 
            };
        },
        mixins: [routingBetween, isValid, isEmpty],
        props: {
            Content: {
                type: Array, 
                default: function(){
                    return null
                },
            }
        },
        components: {
            BookInfo: () => import('../components/BookInfoCompressed'),
        },

    }
</script>

<style scoped>
</style>
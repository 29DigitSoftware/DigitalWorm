<template>

    <div class="comments-wrapper">
        
        <div class="comments">

            <comment-form />

            <comment-item 
                v-for="comment in comments" 
                :key="comment.id" 

                :Content="comment"    
            />

        </div>

    </div>

</template>

<script>
    import CommentForm from '../components/CommentForm'

    export default {
        data(){
            return { 
                comments: null
            };
        },
        created(){
            this.fetchComments();
        },
        methods: {
            fetchComments(){
                axios.get('api/comments')
                .then(response => this.comments = response.data)
            }
        },
        components: {
            CommentItem: () => import('../components/items/CommentItem'),
            CommentForm,
        },

    }
</script>


<style scoped>
html, body {
  background-color: #f0f2fa;
  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  color: #555f77;
  -webkit-font-smoothing: antialiased;
}

p {
  line-height: 1.3125rem;
}
.comments-wrapper {
    background-color: #F8F8F8;
    padding: 16px;

    box-shadow: 0px 3px 6px #00000029;

    color: #2F3138;
    border-radius: 10px;
    font-weight: 800;
}
.comments {
  margin: 16px auto;
  padding: 16px;
}


</style>
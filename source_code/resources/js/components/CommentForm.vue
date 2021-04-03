<template>

    <div class="comment-wrap">
        <div class="photo">
                <div class="avatar" style="background-image: url('http://www.landscapingbydesign.com.au/wp-content/uploads/2018/11/img-person-placeholder.jpg')"></div>
        </div>
        <div class="comment-block">
            <form action="">
                <textarea 
                    v-model.trim="comment"
                    name="" 
                    id="" 
                    cols="30" 
                    rows="3" 
                    placeholder="Add comment...">
                </textarea>
            </form>
            <button 
                type="button" 
                class="btn mt-4 float-right"

                @click="addComment"
            >
                Submit
            </button>
        </div>
    </div>
   

</template>

<script>
    export default {
        data(){
            return { 
                comment: ''
            };
        },
        props: {
            Content: {
                type: Array, 
                default: function(){
                    return null
                },
            }
        },
        methods: {
            addComment(){
                console.log(this.comment);
            }
        }

    }
</script>


<style scoped>
html, body {
  background-color: #f0f2fa;
  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  color: #555f77;
  -webkit-font-smoothing: antialiased;
}

input, textarea {
  outline: none;
  border: none;
  display: block;
  margin: 0;
  padding: 0;
  -webkit-font-smoothing: antialiased;
  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  font-size: 1rem;
  color: #555f77;
}
input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
  color: #ced2db;
}
input::-moz-placeholder, textarea::-moz-placeholder {
  color: #ced2db;
}
input:-moz-placeholder, textarea:-moz-placeholder {
  color: #ced2db;
}
input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  color: #ced2db;
}


.comment-wrap {
  margin-bottom: 1.25rem;
  display: table;
  width: 100%;
  min-height: 5.3125rem;
}

.photo {
  padding-top: 0.625rem;
  display: table-cell;
  width: 3.5rem;
}
.photo .avatar {
  height: 2.25rem;
  width: 2.25rem;
  border-radius: 50%;
  background-size: contain;
}

.comment-block {
  padding: 1rem;
  background-color: #fff;
  display: table-cell;
  vertical-align: top;
  border-radius: 0.1875rem;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
}
.comment-block textarea {
  width: 100%;
  resize: none;
}

@media only screen and (max-width: 350px) {
  .photo {
    display: none;
  }
}
</style>
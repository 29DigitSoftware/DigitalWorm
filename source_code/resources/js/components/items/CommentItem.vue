<template>
    
    <div class="comment-wrap">
        <div class="photo">
            <div class="avatar" style="background-image: url('http://www.landscapingbydesign.com.au/wp-content/uploads/2018/11/img-person-placeholder.jpg')"></div>
        </div>
        <div class="comment-block">
            <p class="comment-text">{{Content.text}}</p>
            <div class="bottom-comment">
                <div class="comment-author">Author: @{{Content.email}}</div>
                <div class="comment-date">{{Content.date}}</div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return { 
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

    }
</script>

<style scoped>

p {
  line-height: 1.3125rem;
}

.comments {
  margin: 2.5rem auto 0;
  max-width: 60.75rem;
  padding: 0 1.25rem;
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

.comment-text {
  margin-bottom: 1.25rem;
}

.bottom-comment {
  color: #acb4c2;
  font-size: 0.875rem;
}

.comment-date {
  float: left;
}

.comment-author {
    color: black;
    margin: 5px 0px;
}

.comment-author:hover {
  color: #0095ff;
}

@media only screen and (max-width: 350px) {
  .photo {
    display: none;
  }
}

</style>
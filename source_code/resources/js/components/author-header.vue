<template>
    <colored-header 
        :title="title"
        colorStyle="green"
        :Search="true"
    >
       
        <div class="row" >
            <div class="author_block">
                <img 
                    onerror="this.style.display='none'"
                    onsuspense="this.style.display='none'"
                    src="http://www.landscapingbydesign.com.au/wp-content/uploads/2018/11/img-person-placeholder.jpg"
                    alt="avatar"
                    class="author_block_avatar animated-background"
                >
                <div class="author_block_titles">
                    <p class="author_block_titles_name">{{ Author.name }} {{Author.surname}}</p>
                    <p class="author_block_titles_job"> {{Author.title}} </p>
                    <!-- <div class="author_block_stats">
                        <div class="author_block_stats_item author_block_titles_likes"> 
                            <span> <i class="fa fa-thumbs-up"></i> </span> 
                            <span> 100 Likes </span>
                        </div>
                        <div class="author_block_stats_item author_block_titles_booksNumber">
                            <span> <i class="fa fa-book"></i> </span> 
                            <span> 100 books </span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
    </colored-header>
</template>

<script>
    import ColoredHeader from '../components/colored-header';

    export default {
        data(){
            return {
                title: "Авторлар",
                Author: {
                    title: "Loading",
                },
            };
        },
        
        props: {
            Author: {},
        },

        components: {
            ColoredHeader,
        },

    }
</script>



<style scoped>

    .author_block {
        
        display: flex;
        align-items: center;

        height: 96px;
        width: 90%;

        margin-left: 16px;
        margin-top: 10px;
        /* margin-bottom: 8px;; */

    }

    .author_block .author_block_avatar {
        height: 80px;
        width: 80px;
        border-radius: 5px;
        margin-right: 24px;
    
        box-shadow: 0px 3px 6px #00000029;
        margin-left: 20px;
    }

    .author_block .author_block_titles_name {
        font-size: 18px;
        font-weight: 600;
        text-transform: capitalize;
        margin-bottom: 5px;
    }

    .author_block .author_block_titles_job {
        font-size: 15px;
        margin-bottom: 16px;
    }
    
    .author_block .author_block_stats {
        display: flex;
        flex-flow: row;
        justify-content: space-around;

    }

    .author_block_stats_item {
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: space-between;
        min-height: 32px;
    }

    .author_block .author_block_titles_job, .author_block_titles_likes, .author_block_titles_booksNumber {
        font-size: 15px;
        font-weight: normal;
        text-transform: capitalize;
        margin-right: 8px;
    }

    .author_block .fa{
        font-size: 14px !important;
    }

</style>
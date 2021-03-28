<template>
    <div class="wrapper">
        <book-info />
    </div>
</template>

<script>
    import BookInfo from '../components/BookInfo';
    export default {
        components: {
            BookInfo,
        }
    }
</script>

<style scoped>

    .wrapper {
        height: 100vh;
        /* background: pink; */
    }

    .container {
        margin-bottom: 0%;
    }
    /*
    .header {
        margin-top: 3%;
        padding-top: 5%;
    } */

    .page-title {
        vertical-align: auto;
        padding: 0px;
        height: 100%;
    }
    .page-title p {
        text-align: center;
        font-family: 'Nunito'; font-weight: bold; font-style: normal;
        color: #FFFFFF;
        text-transform: uppercase;
        margin: 0px;
        line-height: 250%;
    }

    .back-button button {
        color: #FFFFFF;
    }

    .search {
        padding-right: 0;
        margin-right: 3%;
        margin-left: 5%;
        width: 80%;
        opacity: 1;
        background-color: #F0F0F0;
        border: none;
    }

    .question {
        margin-top: 3px;
        padding: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #353535 0% 0% no-repeat padding-box;
        color: #3C6E71;
        align-items: center;
    }

    .row {
        margin-bottom: 5%;
    }
    .autors-image {
        display: flexbox;
        flex-shrink: 0;
        width: 60px;
        height: calc(100% - 40px);
    }

    .autors-image img {
        position: relative;
        width: 70px;
        height: 70px;
        border-radius: 10px;
        margin: 0;
    }
    .text_info{
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        padding-left: 2%;
        
    }
    .text_info h6{
        margin: 0;
        padding: 0;
        font: normal normal bold 12px/14px Nunito;
        letter-spacing: -0.45px;
        color: #2F3138;
        opacity: 1;
        color: #FFFFFF;
    }
    .text_info p{
        margin: 0;
        padding: 0;
        font: normal normal bold 10px/12px Nunito;
        letter-spacing: -0.45px;
        color: #2F3138;
        opacity: 1;
        color: #FFFFFF;
    }
    .avatar{
        margin-left: 1%;
        padding-bottom: 3%;
        vertical-align: middle;
        display: flex;
        text-align: left;
        align-items: center;
        padding-bottom: 8%;
    }
    .text_info .row{
        margin: 1%;
        display: flex;
        padding-right: 25%;
        text-align: center;
        align-items: center;
        vertical-align: middle;
    }
    .green{
        background-color: #3C6E71;
        margin:3% 2%;
        width:auto;
        border-radius: 2%;
    }
    .text_info .logo{
        margin-right: 3%;
    }
    .text_info .likes{
        padding-top: 2%;
        margin-right: 4%;
    }
    .btn{
        color: #ffffff;
    }
</style>
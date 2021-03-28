<template>
    <div id="find" class="wrapper">
        <div class="container">
            <div class="row search-question">
                <div class="col-1 back">
                    <div class="back-button">
                        <button type="button" class="btn btn-link"><i class="fas fa-chevron-left"></i></button>
                    </div>
                </div>
                <div class="col-11 in">
                    <input class="form-control search" type="search" placeholder="жастарға" aria-label="Search">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="outer-find">
                        <div class="inner-content-find">
                            <img src="/img/images (3).png">
                            <p class="title"><span class="change">Жастар</span> және Иман</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-sm-left path">БЕСТСЕЛЛЕРЫ> <span class="kolor">ЖАСТЫҚ ШАҚ</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="num par">1.</p>
                </div>
                <div class="col-11 par">
                    <p class="text-sm-left text"><span class="kolor">Жастарға</span> арналған бағдармалар менжобалар жоқ емес,
                        бар,атап айтатын болсақ,'болашақ' бағдарламасы, 'дар'...
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <p class="text-sm-left path">ЖАҢА> <span class="kolor">ЖАСТАР ЖӘНЕ ИМАН</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-1 ">
                    <p class="num par">2.</p>
                </div>
                <div class="col-11 par">
                    <p class="text-sm-left text"><span class="kolor">Жастарға</span> саясатының бағдарламаларымен жобаларын іске
                    асыруға жастарды толыққанды табиғи дамыту спорттық...
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        el: "#find",
        components: {

        }
    }
</script>

<style scoped>

    .container {
        margin-bottom: 5%;
    }
    .in{
        padding-left: 0;
    }
    .back-button button {
        color: #2F3138;
        padding-left:0;
    }
    .back{
        padding-left: 0;
    }
    .search-question{
        margin:2% 0;
    }
    .search {
        padding-right: 0;
        margin-right: 3%;
        width: 100%;
        opacity: 1;
        background-color: #F0F0F0;
        border: none;
    }
    .row input{
        margin-bottom: 3%;
        width: 100%;
    }
    .outer-find{
        display: flex;
        flex: 1;
        flex-flow: row wrap;
        
    }
    .change{
        color: #3C6E71;
    }
    .outer-find p{
        text-align: center;
        font: Condensed Bold 9px/11px Nunito;
        letter-spacing: 0px;
        color: #212121;
        margin-top: 2%;
    }
    .inner-content-find{
        text-align: center;
    }
    .inner-content-find img{
        margin:3%;
        border-radius: 5px;
    }
    .col .path{
        text-align: left;
        font: Condensed Bold 8px/9px Nunito;
        letter-spacing: 0px;
        opacity: 1;
        margin-right: 30px;
    }
    .kolor{
        color: #3C6E71;
    }
    ::placeholder {
    color: #3C6E71;
    opacity: 1; /* Firefox */
    }
    .row .text{
        text-align: left;
        font: Condensed Bold 11px/13px Nunito;
        letter-spacing: 0px;
        opacity: 1;
    }
    .row .num{
        text-align: left;
        font: Condensed Bold 9px/11px Nunito;
        letter-spacing: 0px;
        color: #212121;
        opacity: 1;
        padding-right: 0;
    }
    .par{
        padding-left: 0;
    }
</style>
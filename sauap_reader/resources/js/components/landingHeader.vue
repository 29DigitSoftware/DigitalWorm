<template>
    <div id="home" class="header">

        <!-- Start Header Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12">
                    <div class='pl-3 pt-3'>
                        <back-button-item 
                            color="white"
                            goTo="close"
                        />
                    </div>
                    <div class="head-inner ">
                        <div class="head-txt">
                            <div class="mb-5 head__image-wrapper rounded-circle">
                                <img 
                                    src="../../../public/worm.png"  
                                    width="120px"
                                    alt=""
                                >
                            </div>
                            <h1>Кітаптарды шексіз оқыңыз</h1>
                            <p>Бір айға жазылыңыз және біздің мәліметтер қорындағы барлық кітаптарға қол жеткізіңіз</p>

                            <!-- <div class="head-bttn" @click="goTo('profile')">
                                <button type="button" class="login btn btn-light"><b>Profile</b></button>
                            </div> -->


                            <div class="head-bttn" @click="goTo('catalog')">
                                <!-- <a href="#" class="bttn bttn-white">LogIn</a> -->
                                <button type="button" class="catalog btn btn-light font-weight-bold "><b>Kitap Al</b></button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 d-none d-md-block">
                    <div class="head-img">
                        <img class="img-fluid" src="http://placehold.it/1793x3566" alt="Huda">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Content -->
    </div>
</template>

<script>

    import BackButtonItem from './items/back-button-item'

    export default {
        data(){
            return {
            };
        },
        created() {
        },
        components: {
            BackButtonItem
        },
        computed: {
        },
        methods: {
            goTo(path) {
                this.$router.push({ 
                    name: path
                });
            },
        }
    }

</script>

<style lang="scss" scoped>
    .catalog{
        padding-left: 1.5em;
        padding-right: 1.5em;
        border-radius: 25px;
        font-size: 20px;
    }

    .head__image-wrapper {
        height: 150px;
        width: 150px;
        background-color: white;
        display: flex;
        align-items: center;

        @media screen and (max-width: 600px) {
            margin: auto;   
        }

        img {
            margin: auto;
        }
    }
</style>
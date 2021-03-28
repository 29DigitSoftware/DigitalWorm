<template>

    <section id="pricing-table" class="pricing-table pt-5">
        
        <!-- <div class='pl-3 pb-3'>
            
        </div>
        
         -->
        <div class="container">
            <!-- Stasdrt Section Title -->
            <div class="section-title">
                <div class="d-flex">
                    <back-button-item 
                        class="mr-auto"
                        v-if="goBackButton"
                        color="black"
                    />
                    <h2 class="w-100 mx-auto ">Баға</h2>
                </div>
                <p>Сіз ай сайынғы жазылымды сатып ала аласыз</p>
            </div>
            <!-- End Section Title -->
            <div class="row justify-content-around">
                <!-- Start Price Box -->
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="price-box">
                        <h4 class="price-title">1 ай</h4>
                        <div class="price-content">
                            <div class="price-icon">
                                <i class='bx bx-user'></i>
                            </div>
                            <div class="price-number">
                                <h4><span>500 тг</span> айына</h4>
                            </div>
                            <div class="price-features">
                                <ul class="list-unstyled">
                                    <li>Ыңғайлы поиск<i class='bx bx-check'></i></li>
                                    <li>Барлық кітаптар қол жетімді<i class='bx bx-check'></i></li>
                                </ul>
                            </div>
                            <div class="price-bttn">
                                <a href="#" class="bttn dblue">Сатып алу</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Price Box -->
            </div>
        </div>
    </section>

</template>

<script>

    import BackButtonItem from '../components/items/back-button-item'

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
        props: {
            goBackButton: {
                default: true
            }
        },
        computed: {
        },
        methods: {
            goToPath() {
                
                this.$router.push({ 
                    name: 'catalog'
                });
            },
        }
    }

</script>


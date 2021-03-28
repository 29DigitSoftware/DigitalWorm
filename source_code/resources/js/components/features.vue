<template>
    
    <main>
        <!-- Start About Section -->
        <section id="about" class="about pdd70 pb-5">
            <div class="container">
                <!-- Start Section Title -->
                <div class="section-title">
                    <h2>Ерекшеліктер</h2>
                    <p>Біз өте сапалы өнім жасауға тырыстық, сондықтан біздің қосымша өте ыңғайлы және кез келген адам қалаған кітабің оқи алады.</p>
                </div>
                <!-- End Section Title -->
                <!-- Start About Boxes -->
                <div class="about-boxes">
                    <div class="row">
                        <!-- Start One Item -->
                        <!-- End One Item -->
                        <!-- Start One Item -->
                        <div class="col-lg-3 col-12 col-sm-6">
                            <div class="about-box">
                                <div class="box-top">
                                    <i class='bx bx-layout'></i>
                                    <h4>Қолжетімді (басыңыз)</h4>
                                </div>
                                <div class="content">
                                    <i class='bx bx-layout bx-tada'></i>
                                    <h3>Қолжетімді</h3>
                                    <p>Кез келген кітапті еш кедергісіз оқи аласыз.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End One Item -->
                        <!-- Start One Item -->
                        <div class="col-lg-3 col-12 col-sm-6">
                            <div class="about-box">
                                <div class="box-top">
                                    <i class='bx bx-diamond'></i>
                                    <h4>Бірегей дизайн (басыңыз)</h4>
                                </div>
                                <div class="content">
                                    <i class='bx bx-diamond bx-tada'></i>
                                    <h3>Бірегей дизайн</h3>
                                    <p>Бірегей дизайн.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End One Item -->
                        <!-- Start One Item -->
                        <div class="col-lg-3 col-12 col-sm-6">
                            <div class="about-box">
                                <div class="box-top">
                                    <i class='bx bx-rocket'></i>
                                    <h4>Жылдам жүктеу (басыңыз)</h4>
                                </div>
                                <div class="content">
                                    <i class='bx bx-rocket bx-tada'></i>
                                    <h3>Жылдам жүктеу</h3>
                                    <p>Жылдам жүктеу.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End One Item -->
                    </div>
                </div>
                <!-- End About Boxes -->
            </div><!-- </container> -->
        </section>
    </main>        

</template>

<script>

    export default {
        data(){
            return {
            };
        },
        created() {
        },
        components: {
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


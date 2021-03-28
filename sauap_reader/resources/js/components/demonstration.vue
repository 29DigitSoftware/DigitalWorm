<template>
    
    <section id="counter-box" class="counter-box pdd70">
        <div class="container">
            <!-- Start Section Title -->
            <div class="section-title">
                <h2>Көңілді фактылар</h2>
                <p>Біз өте сапалы өнім жасауға тырыстық, сондықтан біздің қосымша өте ыңғайлы және кез келген адам қалаған кітабің оқи алады.</p>
            </div>
            <!-- End Section Title -->
            <!-- Start Counter Inner -->
            <div class="counter-inner">
                <div class="row">
                    <!-- Start Box -->
                    <div class="col-6 col-lg-3">
                        <div class="counter">
                            <div class="counter-content">
                                <i class='bx bx-group bx-tada'></i>
                                <div class="counter-shadow"></div>
                            </div>
                            <span class="counter-value">345</span>
                            <h3>Авторлар</h3>
                        </div>
                    </div>
                    <!-- End Box -->
                    <!-- Start Box -->
                    <div class="col-6 col-lg-3">
                        <div class="counter active">
                            <div class="counter-content">
                                <i class='bx bx-cloud-download bx-tada'></i>
                                <div class="counter-shadow"></div>
                            </div>
                            <span class="counter-value">657</span>
                            <h3>Кітаптар</h3>
                        </div>
                    </div>
                    <!-- End Box -->
                    <!-- Start Box -->
                    <div class="col-6 col-lg-3">
                        <div class="counter">
                            <div class="counter-content">
                                <i class='bx bx-star bx-tada'></i>
                                <div class="counter-shadow"></div>
                            </div>
                            <span class="counter-value">54</span>
                            <h3>Катңгориялар</h3>
                        </div>
                    </div>
                    <!-- End Box -->
                    <!-- Start Box -->
                    <div class="col-6 col-lg-3">
                        <div class="counter">
                            <div class="counter-content">
                                <i class='bx bx-heart bx-tada'></i>
                                <div class="counter-shadow"></div>
                            </div>
                            <span class="counter-value">31</span>
                            <h3>Тесттер</h3>
                        </div>
                    </div>
                    <!-- End Box -->
                </div>
            </div>
            <!-- End Counter Inner -->
        </div>
    </section>

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


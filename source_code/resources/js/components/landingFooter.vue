<template>

    <footer id="footer" class="footer">
        <div class="container">
            <!-- Footer Social -->
            <div class="footer-social">
                <div class="row">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="copyright-txt">
                            <span>Барлық құқық қорғалған ©2021 <a href="https://sauapsoft.kz"
                                    target="_blank"></a>.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="social-link">
                            <ul class="list-unstyled d-flex">
                                <li><a href="https://www.instagram.com/sauapkz/"><i class="bx bxl-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
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
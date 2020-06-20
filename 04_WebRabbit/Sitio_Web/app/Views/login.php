<?php
include_once('template/header.php');
?>
    <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/contact-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <section class="contact-section spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
            </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Iniciar Sessión</h5>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="text" placeholder="Nombre de usuario">
                                        <img src="<?= base_url('vendor/template/img/edit.png')?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="text" placeholder="Contraseña">
                                        <img src="<?= base_url('vendor/template/img/edit.png')?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <button type="submit">Entrar <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <?php include_once('template/footer.php') ?>
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                <div class="privacy-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Photo Requests</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    
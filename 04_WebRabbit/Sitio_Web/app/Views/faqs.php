<?php
include_once('template/header.php');
?>
    <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/rooms-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>FAQs</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

       <section class="room-section spad">
        <div class="container">
        <?php foreach($f as $el): ?>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="room-text">
                            <div class="room-title">
                                <h2><?=$el['pregunta']?></h2>
                            </div>
                            <div class="room-desc">
                                <p><?=$el['respuesta']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>

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
   
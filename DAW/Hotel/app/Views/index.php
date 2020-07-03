<?php
include_once('template/header.php');
?>
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="<?= base_url('vendor/template/img/slider-1.jpg')?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Esperamos que disfrutes tú estancia.</h1>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="<?= base_url('vendor/template/img/room-slider/room-1.jpg')?>" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="<?= base_url('vendor/template/img/room-slider/room-2.jpg')?>" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="<?= base_url('vendor/template/img/room-slider/room-3.jpg')?>" alt="">
                                </div>
                            </div>
                            <div class="room-text">
                                <?php foreach ($room as $el):?>    
                                <div class="room-title">  
                                    <h2><?=$el['tipoCuarto']?></h2>
                                    <div class="room-price">
                                        <span>Desde</span>
                                        <h2><?=$el['precioCuarto']?></h2>
                                    </div>
                                </div>
                                <?php endforeach;?> 
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>Wi-Fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.403697403623!2d-100.72219748544427!3d20.033526626382038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd6721eb9e15f%3A0x57a5fcb8ec4cafa6!2sHotel%20Posada%20Virrey%20de%20Mendoza!5e0!3m2!1ses-419!2smx!4v1586151400092!5m2!1ses-419!2smx" width="600" height="600" frameborder="10" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Availability Section End -->

    <!-- Follow Instagram Section Begin -->
    <section class="follow-instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>hotelposadavirrey@gmail.com</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Follow Instagram Section End -->

    <!-- Footer Room Pic Section Begin -->
    <div class="footer-room-pic">
        <div class="container-fluid">
            <div class="row">
                <img src="<?= base_url('vendor/template/img/room-footer-pic/room-1.jpg')?>" alt="">
                <img src="<?= base_url('vendor/template/img/room-footer-pic/room-2.jpg')?>" alt="">
                <img src="<?= base_url('vendor/template/img/room-footer-pic/room-3.jpg')?>" alt="">
                <img src="<?= base_url('vendor/template/img/room-footer-pic/room-4.jpeg')?>" alt="">
            </div>
        </div>
    </div>
    <!-- Footer Room Pic Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <?php include_once('template/footer.php') ?>
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                <div class="privacy-links">
                    <a href="#">Politica de privacidad</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
   
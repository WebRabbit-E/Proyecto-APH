<?php
include_once('template/header.php');
?>
    <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/contact-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contacto</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="Servicios" class="left-nav"><i class="lnr lnr-arrow-left"></i> Servicios</a>
                </div>
            </div>
        </div>
    </section>
      <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Información de Contacto</h2>
                            <ul>
                                <li><img src="<?= base_url('vendor/template/img/placeholder-copy.png')?>" alt=""> <span>Andador Juaréz N°497 Col. Centro C.P. 38600 Acámbaro Gto.</span></li>
                                <li><img src="<?= base_url('vendor/template/img/phone-copy.png')?>" alt=""> <span>(417)172-0461</span></li>
                                <li><img src="<?= base_url('vendor/template/img/envelop.png')?>" alt=""> <span>hotelposadavirrey@gmail.com</span></li>
                                <li><img src="<?= base_url('vendor/template/img/clock-copy.png')?>" alt=""> <span>Todos los dias: 06:00 -22:00</span></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h2>Siguenos en:</h2>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Mandanos un mensaje...</h5>
                        <form action="Contacto/guardarMensaje" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>De</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nombre Completo" name="nombreMsj"  id="nombreMsj" required autocomplete="off">
                                        <img src="<?= base_url('vendor/template/img/edit.png')?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="email" placeholder="Email" id="correoMsj" name="correoMsj" required autocomplete="off">
                                        <img src="<?= base_url('vendor/template/img/envelop-copy.png')?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group phone-num">
                                        <input type="text" placeholder="Número Telefónico" id="telefonoMsj" name="telefonoMsj" autocomplete="off">
                                        <img src="<?= base_url('vendor/template/img/phone-copy.png')?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="message">
                                        <p>Mensaje</p>
                                        <div class="textarea">
                                            <textarea placeholder="Hola ..." id="mensaje" name="mensaje" required></textarea>
                                            <input type="hidden" value="0" id="estatusMsj" name="estatusMsj">
                                            <img src="<?= base_url('vendor/template/img/speech-copy.png')?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <button type="submit">Enviar <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.403697403623!2d-100.72219748544427!3d20.033526626382038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd6721eb9e15f%3A0x57a5fcb8ec4cafa6!2sHotel%20Posada%20Virrey%20de%20Mendoza!5e0!3m2!1ses-419!2smx!4v1586151400092!5m2!1ses-419!2smx"
            height="560" style="border:0;" allowfullscreen=""></iframe>
    </div>

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
    
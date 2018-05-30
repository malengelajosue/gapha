<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Katanga Golden Services | KGS:: Acceuil </title>
          <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="<?php echo base_url()?>/assets/dist/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Couchs Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
       
        <!--flexslider-->
        <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/flexslider.css" type="text/css" media="screen" />
        <!--//flexslider-->
        <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/lightbox.css" type="text/css">


    </head>
    <body>
        <!--header-->
        <div class="header">
            <div>
                <!---->
                <div class="header-logo">
                    <div class="logo">
                        <a href="index.html"><img src="<?php echo base_url()?>assets/dist/img/logo.png" alt="" ></a>
                    </div>
                    <div class="top-nav">
                        <span class="icon"><img src="<?php echo base_url()?>assets/dist/img/menu.png" alt=""> </span>
                        <ul>
                            <li><a href="#services" class="scroll">Services</a></li>
                            <li><a href="#gallery" class="scroll">Gallerie</a></li>
                            <li ><a href="#about" class="scroll">Apropos</a> </li>
                            <li><a href="#contact" class="scroll">Contactez-nous</a></li>
                        </ul>
                        <!--script-->
                        <script>
                            $("span.icon").click(function () {
                                $(".top-nav ul").slideToggle(500, function () {
                                });
                            });
                        </script>				
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!---->
                <div class="top-menu">					
                    <ul>
                        <li><a href="#services" class="scroll" data-hover="Services ">Services </a></li>
                        <li><a href="#gallery" class="scroll" data-hover="Gallerie" >Gallerie</a></li>
                        <li><a href="index.html"><img src="<?php echo base_url()?>assets/dist/img/logo.png" alt="" ></a></li>
                        <li ><a href="#about" class="scroll" data-hover="Apropos">Apropos  </a> </li>
                        <li><a href="#contact" class="scroll" data-hover="Contactez-nous">Contactez-nous </a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <!--script-->
                <div class="banner">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="banner-matter">
                                        <h3>Maintenir la qualité des nos services tout au long de la croissance de nos activités. </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-matter">
                                        <h3>Etre honnêtes,loyaux et responsables. Satisfaire au mieux nos clients, assurer un service rapide, de qualité et à des prix compétitifs  </h3>

                                    </div>
                                </li>
                                <li>
                                    <div class="banner-matter">
                                        <h3>Maintenir la qualité des nos services tout au long de la croissance de nos activités.</h3>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <script>window.jQuery || document.write('<script src=<?php echo base_url()?>assets/dist/js//libs/jquery-1.7.min.js">\x3C/script>')</script>
                    <!--FlexSlider-->
                    <script defer src="<?php echo base_url()?>/assets/js/jquery.flexslider.js"></script>
                    <script type="text/javascript">
                        $(function () {
                            SyntaxHighlighter.all();
                        });
                        $(window).load(function () {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                start: function (slider) {
                                    $('body').removeClass('loading');
                                }
                            });
                        });
                    </script>

                </div>				
            </div>
        </div>
        <!--//header-->
        <!--about-->
        <div class="about" id="services">
            <div class="container">
                <h2>Services</h2>
                <h5>Notre entreprise maintient un stock varié et diversifié de matériels et consommables critiques afin de faire face à la volatilité et aux ruptures des chaines d'approvisionnement. Notre liste contient entre autres:</h5>
                <p>ptaiades kertyaser daesraeds. Casrolern atur aut oditaut. Binsequuntur magni dolqui ratione volmsequi nesciu orbosas numquam Casrolern atur aut oditaut. Binsequuntur magni dolqui ratione volmsequi nesciu orbosas ratione volmsequi nesciu  numquam eius modi teincidunt, ut labore et dolore magnam eius modi teincidunt, ut labore et dolore magnam.</p>

                <div class="application">
                    <div class="col-md-3 appli-left">
                        <div class="app-lft">
                            <span class="glyphicon glyphicon-home"> </span>
                            <p>Rapidité.</p>

                        </div>
                    </div>
                    <div class="col-md-3 appli-left">
                        <div class="app-lft">
                            <span class="glyphicon glyphicon-cog"> </span>
                            <p>Efficacité .</p>

                        </div>

                    </div>
                    <div class="col-md-3 appli-left">
                        <div class="app-lft">
                            <span class="glyphicon glyphicon-globe"> </span>
                            <p>Respect .</p>

                        </div>

                    </div>
                    <div class="col-md-3 appli-left1">
                        <div class="app-lft">
                            <span class="glyphicon glyphicon-star"> </span>
                            <p>Innovation.</p>

                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--//about-->
        <!--Cool-->
        <div class="Cool">
            <div class="container">
                <h3>Nous offrons</h3>
                <div class="col-md-6 Cool-left">
                    <img src="<?php echo base_url()?>assets/dist/img/2.jpg" class="img-responsive" alt=""/>
                    <h4>Fournitures de bureau</h4>
                    <p>Nous fournissons une variété de meubles pour embelir vos bureaux et les équipés à vos goûts.</p>
                </div>
                <div class="col-md-6 Cool-left">
                    <img src="<?php echo base_url()?>assets/dist/img/7.jpg" class="img-responsive" alt=""/>
                    <h4>Imprimerie</h4>
                    <p>Nous imprimons sur sur : t-shirt,Stylo,Tasses,carnets,registres des facturiers,et autres.</p>
                </div>
                <div class="clearfix"></div>
                <div class="co-top">
                    <div class="col-md-6 Cool-left">
                        <img src="<?php echo base_url()?>assets/dist/img/8.jpg" class="img-responsive" alt=""/>
                        <h4>Matériels Informatiques</h4>
                        <p> Nous offrons differents équipements pour vos travaux en informatiques. PC,Imprimante,Hub,...</p>
                    </div>
                    <div class="col-md-6 Cool-left">
                        <img src="<?php echo base_url()?>assets/dist/img/2.jpg" class="img-responsive" alt=""/>
                        <h4>Construction</h4>
                        <p>Pour tous vos travaux de contruction et réhabilitation,nous mettons à votre disposition une équipe professionnelle et expérimentée.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--//Cool-->
        <!--welcome-->
        <div class="welcome-btm" id="about">
            <div class="container">
                <h3>Apropos de nous!</h3>
                <div class="col-md-4 wel-rt">
                    <img src="<?php echo base_url()?>assets/dist/img/logoabout.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-md-8 we-lf">
                    <h4>Qui sommes-nous ?</h4>
                    <p> KGS est une entreprise locale créée en Octobre 2010 et basée à Lubumbashi. Notre objectif principal était initialement de
                        d'assurer aux entreprises implantées dans la province un support en matière d'acquisition des fournitures matériels et consommables de bureau.Nous pouvons aussi etendre nos activités aux diverses fournitures et aux matériaux de construction et quincaillerie.</p>
                    <p>L'expérience et le succès de nos deux premières années,nous ont par la suite encouragés à étendre nos activités à d'autres 
                        types de fournitures telles que les réactifs et consommables industriels, les matériels informatiques ainsi que les équipements de protection individuelle.</p>
                    <p>Nous sommes actuellement une société dynamique et bien implantée dans les provinces du Haut-Katanga et Lualaba. 
                        Nos partenariats commerciaux incluent aussi bien les petites et moyennes entreprises locales que les compagnies minières internationales</p>
                </div>
            </div>
            <!--//welcome-->
            <!--gallery-->
            <div class="gallery" id="gallery">		
                <div class="container">
                    <h3>Our Gallery</h3>
                    <div class="gallery-grids">				
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b1.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b1.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b5.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b5.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b3.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b3.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b4.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b4.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b2.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b2.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel..</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 port-grids view view-fourth">
                            <a class="example-image-link" href="<?php echo base_url()?>assets/dist/img/b6.jpg" data-lightbox="example-set" data-title="">
                                <img src="<?php echo base_url()?>assets/dist/img/b6.jpg" class="img-responsive" alt=""/>
                                <div class="mask">
                                    <p>Fourniture Et materiel..</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>	
                        <script src=<?php echo base_url()?>assets/dist/js//lightbox-plus-jquery.min.js"></script>
                    </div>				
                </div>
            </div>	
            <!--//gallery-->

            <!--ourteam-->
            <div class="ourteam">
                <div class="container">
                    <h3>Nos partenaires</h3>
                    <div class="team-grids">
                        <div class="col-md-3 team-grid">
                            <img src="<?php echo base_url()?>assets/dist/img/6.jpg" class="img-responsive" alt="">
                            <h4>Système Informatique</h4>
                            <p>les matériels informatiques de tout genre</p>
                        </div>
                        <div class="col-md-3 team-grid">
                            <img src="<?php echo base_url()?>assets/dist/img/3.jpg" class="img-responsive" alt="">
                            <h4>H Manning</h4>
                            <p>Les réactifs industriels</p>
                        </div>
                        <div class="col-md-3 team-grid">
                            <img src="<?php echo base_url()?>assets/dist/img/4.jpg" class="img-responsive" alt="">
                            <h4>Kiboko</h4>
                            <p>Dans la construction et matériaux</p>
                        </div>
                        <div class="col-md-3 team-grid">
                            <img src="<?php echo base_url()?>assets/dist/img/5.jpg" class="img-responsive" alt="">
                            <h4>UAC</h4>
                            <p>Meuble de Bureaux</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--//ourteam-->
            <!--contact-->
            <div class="contact" id="contact">
                <div class="container">
                    <h3>Contact</h3>
                    <div class="col-md-8 contact-form">
                        <form>
                            <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Name';}" required="">
                            <div class="col-md-6 cnt-inpt">
                                <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Email';
                                        }" required="">
                            </div>
                            <div class="col-md-6 cnt-inpt">
                                <input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Telephone';
                                        }" required="">
                            </div>
                            <div class="clearfix"> </div>
                            <textarea onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Message...';
                                    }" required=""> Message... </textarea>
                            <input type="submit" value="Envoyer" mailto="heritierkyalupata@gmail.com">
                        </form>
                    </div>
                    <div class="col-md-4 addres">
                        <div class="ad">
                            <h4>Addresses</h4>
                            <address>
                                1029 Av Des Emeteurs,Golf Munua,<br>Lubumbashi,Haut-Katanga RD Congo<br>
                                (243) 81-241-6547 /
                                (243) 99-130-7129<br><br>
                                164 Av Kivunda,Q/Mutashi,C/Manika<br>Kolwezi,Lualaba RD Congo<br>
                                (243) 81-241-6547 /
                                (243) 99-130-7129
                            </address>
                        </div>
                        <div class="map">

                        </div>
                    </div>
                </div>
            </div>
            <!--//contact-->
            <!--copy-->
            <div class="copy">
                <div class="container">
                    <div class="copy-left">
                        <p>© 2018. Tout droit reservé | KGS <a href="<?php echo base_url().'login'?>">Administration</a></p>
                    </div>
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" class="fb"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#" class="gg"></a></li>
                            <li><a href="#" class="pn"></a></li>					
                        </ul>	
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
            <!--//copy-->
            <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/move-top.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/easing.js"></script>
            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $(".scroll").click(function (event) {
                                        event.preventDefault();
                                        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                                    });
                                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    /*
                     var defaults = {
                     containerID: 'toTop', // fading element id
                     containerHoverID: 'toTopHover', // fading element hover id
                     scrollSpeed: 1200,
                     easingType: 'linear' 
                     };
                     */
                    $().UItoTop({easingType: 'easeOutQuart'});
                });
            </script>
    </body>
</html>


<!doctype html>
<html lang="FR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">

        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="assets/css/odometer.css">
        <!-- Popup CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="assets/css/slick.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <link rel="stylesheet" href="assets/css/step.css">

        <title>IZIGO</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

    <body data-spy="scroll" data-offset="120">
      
         <!-- Start Preloader Area -->
        <div class="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- End Preloader Area -->


        <nav class="navbar fixed-top navbar-expand-md navbar-new-bottom">
            <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">

                <ul class="navbar-nav w-100 justify-content-center align-item center px-3 mt-4">
                    <li class="nav-item active mt-1">
                        <a href="#" target="_blank">
                             <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                         <a href="#" target="_blank">
                            <i class="fab fa-twitter"></i>
                         </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="#" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                       <a href="#" target="_blank">
                             <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item mt-0">
                        <a href="mailto:jomarsystems@gmail.com" class="nav-link">Email: </a>
                    </li>
                    <li class="nav-item mt-0">
                        <a href="tel: " class="nav-link">Numéro: </a>
                    </li>
                </ul>
            </div>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                 <!-- <div class="log">  -->
                    <!-- <a class="navbar-brand logo" href="#home">
                       
                    </a> -->
                    <div class="logo">
                        <a href="index.html">
                            <h2>Izigo</h2>
                        </a>
                   </div>
                
                <!-- </div>  -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#home" class="nav-link">
                                Accueil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#about" class="nav-link">
                                A propos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#features" class="nav-link">
                                Caractéristiques
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#screenshots" class="nav-link">
                                Captures d'écran
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#faq" class="nav-link">
                                FAQ
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="blog.html" class="nav-link">
                                Blog
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="#contact" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="others-option">
                        <div class="d-flex align-items-center">
                            <div class="option-item">
                                <a href="#" class="default-btn" id='code'>
                                    <!-- Télécharger
                                    <span></span> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
         <!-- End Navbar Area -->

         <!-- Start Main Banner Area -->
        <div id="home"  class="main-banner">
            <div class="d-table">
                <div class="d-table-cell">

                <div class = 'stepClass'>
                    <div class="container">
                       <div class="accordion" id="accordionExample">
                          
                        <div class="steps">
                                <progress id="progress" value=0 max=100 ></progress>
                                <div class="step-item">
                                    <button id="pending" class="step-button text-center" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pending" aria-expanded="true" aria-controls="pending">
                                        1
                                    </button>
                                    <div class="step-title">
                                        Commande placée
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button id="confirmed" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#confirmed" aria-expanded="false" aria-controls="confirmed">
                                        2
                                    </button>
                                    <div class="step-title">
                                        Commande acceptée
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button id="processing" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#processing" aria-expanded="false" aria-controls="processing">
                                        3
                                    </button>
                                    <div class="step-title">
                                        Ramassage en cours
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button id="out_for_delivery" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#out_for_delivery" aria-expanded="false" aria-controls="out_for_delivery">
                                        4
                                    </button>
                                    <div class="step-title">
                                        Livraison en cours
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button id="delivered" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#delivered" aria-expanded="false" aria-controls="delivered">
                                        5
                                    </button>
                                    <div class="step-title">
                                        Livraison effectuée
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="container-fluid-2">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="default-shape">
                <div class="shape-1">
                    <img src="assets/img/shape/1.png" alt="image">
                </div>

                <div class="shape-2 rotateme">
                    <img src="assets/img/shape/2.png" alt="image">
                </div>

                <div class="shape-3">
                    <img src="assets/img/shape/3.svg" alt="image">
                </div>

                <div class="shape-4">
                    <img src="assets/img/shape/4.svg" alt="image">
                </div>

                <div class="shape-5">
                    <img src="assets/img/shape/5.png" alt="image">
                </div>
            </div>
        </div>
        <!-- End Main Banner Area -->

         <!-- Start Footer Area -->
        <section class="footer-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <a href="#" class="logo">
                                <h1 class='foot'>Izigo</h1>
                            </a>
                             <!-- <p>Plan ahead by day, week, or month, and see project status at a glance. Search and filter to focus in on anything form a single project individual.</p>  -->
                             <ul class="social-list">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget pl-5">
                            <h3>Menu</h3>
                            <ul class="list">
                                <li>
                                    <a href="#home">
                                        Accueil
                                    </a>
                                </li>
                                <li>
                                    <a href="#about">
                                        A propos
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#features">
                                        Caractéristiques
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="#screenshots">
                                        Captures
                                    </a>
                                </li> -->
                                <li>
                                    <a href="#faq">
                                        Faq
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#contact">
                                        Contact
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Application</h3>
                            <ul class="list">
                                <li>
                                    <a href="#features">
                                        Caracteristiques
                                    </a>
                                </li>
                                <li>
                                    <a href="#screenshots">
                                       Captures d'ecran 
                                    </a>
                                </li>
                                <li>
                                    <a href="#contact">
                                        Contact
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        Sign Up
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Release Notes
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        User Program
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Télecharger</h3>
                            
                            <ul class="footer-holder">
                                <li>
                                    <a href="#">
                                        <img src="assets/img/store/1.png" alt="image">
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <img src="assets/img/store/2.png" alt="image">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- End Footer Area -->

         <!-- Start Copy Right Area -->
        <div class="copy-right">
            <div class="container">
                <div class="copy-right-content">
                    <p>
                        <i class="far fa-copyright"></i> 
                        2022 by jomarsystems
                        <!-- <a href="https://hibootstrap.com" target="_blank">
                            Hibootsrap
                        </a> -->
                    </p>
                </div>
            </div>
        </div>
         <!-- End Copy Right Area -->

         <!-- Start Go Top Section -->
        <div class="go-top">
            <i class="fa fa-chevron-up"></i>
            <i class="fa fa-chevron-up"></i>
        </div>

        
         <!-- End Go Top Section -->

        <!-- jQuery Min JS -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <!-- Popper Min JS -->
        <script src="assets/js/popper.min.js"></script>
        <!-- Bootstrap Min JS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Owl Carousel Min JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Appear JS -->
        <script src="assets/js/jquery.appear.js"></script>
        <!-- Odometer JS -->
        <script src="assets/js/odometer.min.js"></script>
        <!-- Slick JS -->
        <script src="assets/js/slick.min.js"></script>
        <!-- Particles JS -->
        <script src="assets/js/particles.min.js"></script>
        <!-- Ripples JS -->
        <script src="assets/js/jquery.ripples-min.js"></script>
        <!-- Popup JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- WOW Min JS -->
        <script src="assets/js/wow.min.js"></script>
        <!-- AjaxChimp Min JS -->
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Form Validator Min JS -->
        <!-- <script src="assets/js/form-validator.min.js"></script> -->
        <!-- Contact Form Min JS -->
        <!-- <script src="assets/js/contact-form-script.js"></script> -->
        <!-- Main JS -->
        <script src="assets/js/main.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpLgOmvCbiSOJ2UDSPpjI9E5QW3UlHbOg"></script>
        <script type="module" src="assets/js/live.js?t=1491313943550"></script>
    </body>
</html>

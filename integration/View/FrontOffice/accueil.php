<?php
include '../../CONTROLLER/TicketController.php';
$ticketC = new TicketController();
$list = $ticketC->listTicket();
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../FRONTOFFICE/assets/images/logo-museetopia.png">
    <link rel="icon" type="image/png" href="../FRONTOFFICE/assets/images/logo-museetopia.png">

        <title>Museetopia</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
            
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/bootstrap-icons.css" rel="stylesheet">

        <link href="assets/css/vegas.min.css" rel="stylesheet">

        <link href="assets/css/tooplate-barista.css" rel="stylesheet">
        

    </head>
    
    <body>            
        <main>
                <nav class="navbar navbar-expand-lg">                
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center" href="index.html">
                            <img src="assets\images\logo-museetopia.png" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
                            Museetopia
                        </a>
        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="assets/navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                                </li>
        
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="#section_2">About</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="#section_3">Our Tickets</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="accueil.php#section_4">Reviews</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="ajoutrec.php">Contact</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="../FrontOffice/reclamation/ajoutrec.php">Reclamation</a>
                                </li>
                            </ul>

                            <div class="ms-lg-3">
                                <a class="btn custom-btn custom-border-btn" href="../BACKOFFICE/ticketList.php">
                                    Dashboard
                                    <i class="bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>


                <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-12 mx-auto">
                                <em class="small-text">welcome to </em>
                                
                                <h1>Museetopia</h1>

                                <p class="text-white mb-4 pb-lg-2">
                                    your <em>favourite</em> Place
                                </p>

                                <a class="btn custom-btn custom-border-btn smoothscroll me-3" href="#section_2">
                                    Our Story
                                </a>

                                <a class="btn custom-btn smoothscroll me-2 mb-2" href="#section_3"><strong>Check Ticket</strong></a>
                            </div>

                        </div>
                    </div>

                    <div class="hero-slides"></div>
                </section>


                <section class="about-section section-padding" id="section_2">
                    <div class="section-overlay"></div>
                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-12">
                                <div class="ratio ratio-1x1">
                                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                                        <source src="assets/videos/BARDO Museum #Tunisia #Travel #4K.mp4" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video>

                                    <div class="about-video-info d-flex flex-column">
                                        <h4 class="mt-auto">We Started Since 2024.</h4>

                                        <h4>Best Tourism WebSite.</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-12 mt-4 mt-lg-0 mx-auto">
                                <em class="text-white">Museetopia</em>

                                <h2 class="text-white mb-3">Tourist Guide</h2>

                                <p class="text-white">The site is new in the town and it becomed a beloved institution among the locals.</p>

                                <p class="text-white">The website was created and  provided by <a rel="nofollow" href="https://www.tooplate.com" target="_blank">script squad</a>.</p>

                                <a href="#barista-team" class="smoothscroll btn custom-btn custom-border-btn mt-3 mb-4">Meet script squad</a>
                            </div>

                        </div>
                    </div>
                </section>


                <section class="barista-section section-padding section-bg" id="barista-team">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                                <em class="text-white">Creative Museetopia</em>

                                <h2 class="text-white">Meet People</h2>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="team-block-wrap">
                                    <div class="team-block-info d-flex flex-column">
                                        <div class="d-flex mt-auto mb-3">
                                            <h4 class="text-white mb-0">Steve</h4>

                                            <p class="badge ms-4"><em>Boss</em></p>
                                        </div>

                                        <p class="text-white mb-0">your favourite coffee daily lives tempor.</p>
                                    </div>

                                    <div class="team-block-image-wrap">
                                        <img src="../FRONTOFFICE/assets/images/team/portrait-elegant-old-man-wearing-suit.jpg" class="team-block-image img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="team-block-wrap">
                                    <div class="team-block-info d-flex flex-column">
                                        <div class="d-flex mt-auto mb-3">
                                            <h4 class="text-white mb-0">Sandra</h4>

                                            <p class="badge ms-4"><em>Manager</em></p>
                                        </div>

                                        <p class="text-white mb-0">your favourite  daily lives.</p>
                                    </div>

                                    <div class="team-block-image-wrap">
                                        <img src="../FRONTOFFICE/assets/images/team/cute-korean-barista-girl-pouring-coffee-prepare-filter-batch-brew-pour-working-cafe.jpg" class="team-block-image img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="team-block-wrap">
                                    <div class="team-block-info d-flex flex-column">
                                        <div class="d-flex mt-auto mb-3">
                                            <h4 class="text-white mb-0">Jackson</h4>

                                            <p class="badge ms-4"><em>Senior</em></p>
                                        </div>

                                        <p class="text-white mb-0">your favourite coffee daily lives.</p>
                                    </div>

                                    <div class="team-block-image-wrap">
                                        <img src="../FRONTOFFICE/assets/images/team/small-business-owner-drinking-coffee.jpg" class="team-block-image img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="team-block-wrap">
                                    <div class="team-block-info d-flex flex-column">
                                        <div class="d-flex mt-auto mb-3">
                                            <h4 class="text-white mb-0">Michelle</h4>

                                            <p class="badge ms-4"><em>Museetopia</em></p>
                                        </div>

                                        <p class="text-white mb-0">your favourite place to visit.</p>
                                    </div>

                                    <div class="team-block-image-wrap">
                                        <img src="../FRONTOFFICE/assets/images/team/smiley-business-woman-working-cashier.jpg" class="team-block-image img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>


                

<!-- affichage des tickets -->
<section class="menu-section section-padding" id="section_3">
    <div class="container">
        <div class="row">
            <?php
                foreach($list as $ticket){
                    ?>     
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card" style="background-color:rgba(0, 0, 0, 0.5); border-radius: 15px; overflow: hidden; position: relative;" >
                                <div class="card-body">
                                    <h4 class="text-warning"><?php echo $ticket['musee_name']; ?></h4>
                                    <p class="text-white ms-auto">Location: <?php echo $ticket['location']; ?></p>
                                    <p class="text-white ms-auto">Date: <?php echo $ticket['date']; ?></p>
                                    <p class="text-white ms-auto">Time: <?php echo $ticket['time']; ?></p>
                                    <p class="text-white ms-auto">Price: <?php echo $ticket['price']; ?> DT</p>
                                    <p class="text-white ms-auto">Category: <?php echo $ticket['category']; ?></p>
                                    <p class="text-white">Availability: <?php echo $ticket['disponible'] ? "yes" : "no"; ?></p>
                                    <a class="btn custom-btn me-2 mb-2" href="reservationForm.php?ticket_id=<?php echo $ticket['id']; ?>" role="button"><strong>RESERVE</strong></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>
<!-- fin affichage des tickets -->
                <section class="reviews-section section-padding section-bg" id="section_4">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                                <em class="text-white">Reviews by Customers</em>

                                <h2 class="text-white">Testimonials</h2>
                            </div>

                            <div class="timeline">
                                <div class="timeline-container timeline-container-left">
                                    <div class="timeline-content">
                                        <div class="reviews-block">
                                            <div class="reviews-block-image-wrap d-flex align-items-center">
                                                <img src="images/reviews/young-woman-with-round-glasses-yellow-sweater.jpg" class="reviews-block-image img-fluid" alt="">

                                                <div class="">
                                                    <h6 class="text-white mb-0">Sandra</h6>
                                                    <em class="text-white"> Customers</em>
                                                </div>
                                            </div>

                                            <div class="reviews-block-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                                <div class="d-flex border-top pt-3 mt-4">
                                                    <strong class="text-white">4.5 <small class="ms-2">Rating</small></strong>

                                                    <div class="reviews-group ms-auto">
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-container timeline-container-right">
                                    <div class="timeline-content">
                                        <div class="reviews-block">
                                            <div class="reviews-block-image-wrap d-flex align-items-center">
                                                <img src="images/reviews/senior-man-white-sweater-eyeglasses.jpg" class="reviews-block-image img-fluid" alt="">

                                                <div class="">
                                                    <h6 class="text-white mb-0">Don</h6>
                                                    <em class="text-white"> Customers</em>
                                                </div>
                                            </div>

                                            <div class="reviews-block-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                                <div class="d-flex border-top pt-3 mt-4">
                                                    <strong class="text-white">4.5 <small class="ms-2">Rating</small></strong>

                                                    <div class="reviews-group ms-auto">
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-container timeline-container-left">
                                    <div class="timeline-content">
                                        <div class="reviews-block">
                                            <div class="reviews-block-image-wrap d-flex align-items-center">
                                                <img src="images/reviews/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair.jpg" class="reviews-block-image img-fluid" alt="">

                                                <div class="">
                                                    <h6 class="text-white mb-0">Olivia</h6>
                                                    <em class="text-white"> Customers</em>
                                                </div>
                                            </div>

                                            <div class="reviews-block-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                                <div class="d-flex border-top pt-3 mt-4">
                                                    <strong class="text-white">4.5 <small class="ms-2">Rating</small></strong>

                                                    <div class="reviews-group ms-auto">
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star-fill"></i>
                                                        <i class="bi-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>


                <section class="contact-section section-padding" id="section_5">
                    <div class="container">
                        <div class="row">   

                            <div class="col-lg-12 col-12">
                                <em class="text-white">Say Hello</em>
                                <h2 class="text-white mb-4 pb-lg-2">Contact</h2>
                            </div>

                            <div class="col-lg-6 col-12">
                                <form action="#" method="post" class="custom-form contact-form" role="form">

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-12">
                                        <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                                        <input type="text" name="name" id="name" class="form-control" placeholder="Jackson" required="">
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="email" class="form-label">Email Address</label>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jack@gmail.com" required="">
                                    </div>

                                    <div class="col-12">
                                        <label for="message" class="form-label">How can we help?</label>

                                        <textarea name="message" rows="4" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12 mx-auto mt-3">
                                    <button type="submit" class="form-control">Send Message</button>
                                </div>
                            </form>
                            </div>

                            <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                                <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5039.668141741662!2d72.81814769288509!3d19.043340656729775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c994f34a7355%3A0x2680d63a6f7e33c2!2sLover%20Point!5e1!3m2!1sen!2sth!4v1692722771770!5m2!1sen!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                            </div>

                        </div>
                    </div>
                </section>


                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-12 me-auto">
                                <em class="text-white d-block mb-4">Where to find us?</em>

                                <strong class="text-white">
                                    <i class="bi-geo-alt me-2"></i>
                                    Technological Pole - El Ghazala
                                </strong>

                                <ul class="social-icon mt-4">
                                    <li class="social-icon-item">
                                        <a href="https://www.facebook.com/profile.php?id=100009109830044" class="social-icon-link bi-facebook" target="_blank">
                                        </a>
                                    </li>
        
                                    <li class="social-icon-item">
                                        <a href="https://x.com/AZIZREBHI7?t=MSXCNGKgc3h1UsyUsoKCkQ&s=09" target="_new" class="social-icon-link bi-twitter" target="_blank">
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="https://www.instagram.com/rebhiaziz/?hl=fr" class="social-icon-link bi-instagram" target="_blank">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                                <em class="text-white d-block mb-4">Contact</em>

                                <p class="d-flex mb-1">
                                    <strong class="me-2">Phone:</strong>
                                    <a href="tel: 30-240-961" class="site-footer-link">
                                        (+216) 
                                        27 571 808
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <strong class="me-2">Email:</strong>

                                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                        aziz.rebhi@esprit.tn
                                    </a>
                                </p>
                            </div>


                            <div class="col-lg-5 col-12">
                                <em class="text-white d-block mb-4">Opening Hours.</em>

                                <ul class="opening-hours-list">
                                    <li class="d-flex">
                                        Monday - Friday
                                        <span class="underline"></span>

                                        <strong>9:00 - 18:00</strong>
                                    </li>

                                    <li class="d-flex">
                                        Saturday
                                        <span class="underline"></span>

                                        <strong>11:00 - 16:30</strong>
                                    </li>

                                    <li class="d-flex">
                                        Sunday
                                        <span class="underline"></span>

                                        <strong>Closed</strong>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-8 col-12 mt-4">
                                <p class="copyright-text mb-0">Copyright © Museetopia 2048 
                            </div>
                    </div>
                </footer>
            </main>

        <!-- JAVASCRIPT FILES -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/click-scroll.js"></script>
        <script src="assets/js/vegas.min.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Maundy - Bootstrap Coming Soon Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="{{ asset('Maundy/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Maundy/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="{{ asset('Maundy/assets/css/style.css') }}" rel="stylesheet">
    
    <!-- =======================================================
        * Template Name: Maundy - v4.6.0
        * Template URL: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    
    <body>
        
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex flex-column align-items-center">
                
                <h1>Maundy</h1>
                <h2>We're working hard to improve our website and we'll ready to launch after</h2>
                <div class="countdown d-flex justify-content-center" data-count="2023/12/3">
                    <div>
                        <h3>%d</h3>
                        <h4>Days</h4>
                    </div>
                    <div>
                        <h3>%h</h3>
                        <h4>Hours</h4>
                    </div>
                    <div>
                        <h3>%m</h3>
                        <h4>Minutes</h4>
                    </div>
                    <div>
                        <h3>%s</h3>
                        <h4>Seconds</h4>
                    </div>
                </div>
                
                <div class="social-links text-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
                
            </div>
        </header><!-- End #header -->
        
        <main id="main">
            
            <!-- ======= Contact Us Section ======= -->
            <section id="contact" class="contact">
                <div class="container">
                    
                    <div class="section-title">
                        <h2>Contact Us</h2>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-5 d-flex align-items-stretch">
                            <div class="info">
                                <div class="username">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Lokasi</h4>
                                    
                                    <p>{{ $user->alamat }}</p>
                                </div>

                                <div class="username">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Username</h4>
                                    
                                    <p>{{ $user->username }}</p>
                                </div>
                                
                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Nama:</h4>
                                    <p>{{ $user->nama }}</p>
                                </div>

                                <div class="username">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>{{ $user->email }}</p>
                                </div>
                                
                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Umur:</h4>
                                    <p>{{ $user->umur}}</p>
                                </div>
                                
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                            </div>
                        </div>
                        
                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <form action="{{ route('landing_page.store', Crypt::encrypt($user->id)) }}" method="post" role="form" class="php-email-form">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Your Name</label>
                                        <input type="text" name="nama" class="form-control" id="nama" >
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Your Email</label>
                                        <input type="email" class="form-control" name="email" id="email" >
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="username">Your Username</label>
                                    <input type="text" class="form-control" name="username" id="username" >
                                </div>
                                <div class="form-group mt-3">
                                    <label for="no_telepon">Your Phone Number</label>
                                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" >
                                </div>
                                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    @if (session('success'))
                                        <div class="alert alert-success" style="margin-top: 15px" role="alert">
                                            <p>{{ session('success') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>

                </div>
            </section><!-- End Contact Us Section -->
            
        </main><!-- End #main -->
        
        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Maundy</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </footer><!-- End #footer -->
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        <!-- Vendor JS Files -->
        <script src="{{ asset('Maundy/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('Maundy/assets/js/main.js') }}"></script>
        
    </body>
    
    </html>
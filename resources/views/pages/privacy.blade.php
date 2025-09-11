<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Privacy Policy - Saiful Islam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Privacy Policy" name="keywords">
    <meta content="Privacy Policy for Saiful Islam's Portfolio" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@400;700&family=Poppins&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="w-100 img-fluid mb-4" src="{{ asset('assets/images/profile.png') }}" alt="Image">
                <h1 class="mt-2" style="color:white">Saiful Islam</h1>
                <div class="mb-4" style="height: 22px;">
                    <h4 class="typed-text-output d-inline-block text-body"></h4>
                    <div class="typed-text d-none">Full Stack Developer, Backend Developer</div>
                </div>
                <div class="navbar">
                    <a href="{{ route('welcome') }}#about" class="nav-item nav-link js-scroll-trigger">About</a>
                    <a href="{{ route('welcome') }}#experience" class="nav-item nav-link js-scroll-trigger">Experience</a>
                    <a href="{{ route('welcome') }}#service" class="nav-item nav-link js-scroll-trigger">Service</a>
                    <a href="{{ route('welcome') }}#portfolio" class="nav-item nav-link js-scroll-trigger">Portfolio</a>
                    <a href="{{ route('welcome') }}#contact" class="nav-item nav-link js-scroll-trigger">Contact</a>
                </div>
                <div class="d-flex justify-content-center mt-auto mb-3">
                    <a class="mx-2" target="_blank" href="https://x.com/appswebengineer"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.facebook.com/engrsaifulislamcse"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.linkedin.com/in/saiful-islam-684a97108/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="mx-2" target="_blank" href="https://github.com/engsaiful0"><i class="fab fa-github"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.youtube.com/@bijoyit"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="d-flex align-items-end justify-content-between">
                    <a href="" class="btn btn-block border-right">Download CV</a>
                    <a href="{{ route('welcome') }}#contact" class="btn btn-block btn-scroll js-scroll-trigger">Contact Me</a>
                </div>
                @auth
                    <div class="d-flex align-items-end justify-content-center mt-2">
                        <a href="/admin/portfolio" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-cog me-1"></i>Admin Panel
                        </a>
                    </div>
                    <div class="auth-buttons mt-2">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="auth-buttons mt-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i>Sign In
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </div>
                @endauth
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            <!-- Privacy Policy Start -->
            <div class="container bg-white py-5">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Privacy Policy</h2>
                        <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>
                    </div>
                    <div class="col-12">
                        <div class="privacy-content">
                            <h4 class="text-primary mb-3">1. Information We Collect</h4>
                            <p class="mb-4">
                                We collect information you provide directly to us, such as when you:
                            </p>
                            <ul class="mb-4">
                                <li>Fill out our contact form</li>
                                <li>Subscribe to our newsletter</li>
                                <li>Communicate with us via email or other means</li>
                                <li>Use our services or website</li>
                            </ul>

                            <h4 class="text-primary mb-3">2. Personal Information</h4>
                            <p class="mb-4">
                                The personal information we may collect includes:
                            </p>
                            <ul class="mb-4">
                                <li>Name and contact information (email address, phone number)</li>
                                <li>Professional information (company, job title)</li>
                                <li>Communication preferences</li>
                                <li>Any other information you choose to provide</li>
                            </ul>

                            <h4 class="text-primary mb-3">3. How We Use Your Information</h4>
                            <p class="mb-4">
                                We use the information we collect to:
                            </p>
                            <ul class="mb-4">
                                <li>Provide, maintain, and improve our services</li>
                                <li>Respond to your inquiries and provide customer support</li>
                                <li>Send you newsletters and updates (with your consent)</li>
                                <li>Process transactions and send related information</li>
                                <li>Comply with legal obligations</li>
                            </ul>

                            <h4 class="text-primary mb-3">4. Information Sharing</h4>
                            <p class="mb-4">
                                We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except:
                            </p>
                            <ul class="mb-4">
                                <li>To trusted service providers who assist us in operating our website</li>
                                <li>When required by law or to protect our rights</li>
                                <li>In connection with a business transfer or acquisition</li>
                            </ul>

                            <h4 class="text-primary mb-3">5. Data Security</h4>
                            <p class="mb-4">
                                We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.
                            </p>

                            <h4 class="text-primary mb-3">6. Cookies and Tracking</h4>
                            <p class="mb-4">
                                Our website may use cookies and similar tracking technologies to enhance your experience. You can control cookie settings through your browser preferences.
                            </p>

                            <h4 class="text-primary mb-3">7. Your Rights</h4>
                            <p class="mb-4">
                                You have the right to:
                            </p>
                            <ul class="mb-4">
                                <li>Access your personal information</li>
                                <li>Correct inaccurate information</li>
                                <li>Request deletion of your information</li>
                                <li>Opt-out of marketing communications</li>
                                <li>Withdraw consent at any time</li>
                            </ul>

                            <h4 class="text-primary mb-3">8. Third-Party Links</h4>
                            <p class="mb-4">
                                Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites.
                            </p>

                            <h4 class="text-primary mb-3">9. Children's Privacy</h4>
                            <p class="mb-4">
                                Our services are not directed to children under 13. We do not knowingly collect personal information from children under 13.
                            </p>

                            <h4 class="text-primary mb-3">10. Changes to This Policy</h4>
                            <p class="mb-4">
                                We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.
                            </p>

                            <h4 class="text-primary mb-3">11. Contact Us</h4>
                            <p class="mb-4">
                                If you have any questions about this privacy policy, please contact us at:
                            </p>
                            <div class="contact-info bg-light p-3 rounded">
                                <p class="mb-2"><strong>Email:</strong> saifuldev2011@gmail.com</p>
                                <p class="mb-2"><strong>Phone:</strong> +8801818 650864</p>
                                <p class="mb-0"><strong>Address:</strong> Chattogram, Bangladesh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Privacy Policy End -->

            <!-- Footer Start -->
            <div class="container-fluid bg-white pt-5 px-0">
                <div class="container bg-dark text-light text-center py-5">
                    <div class="d-flex justify-content-center mb-4">
                        <a class="btn btn-outline-primary btn-square mr-2" href="https://x.com/appswebengineer"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="https://www.facebook.com/engrsaifulislamcse"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="https://www.linkedin.com/in/saiful-islam-684a97108/"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="https://github.com/engsaiful0"><i class="fab fa-github"></i></a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a class="text-white" href="{{ route('privacy') }}">Privacy</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="{{ route('terms') }}">Terms</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="{{ route('faq') }}">FAQs</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="{{ route('welcome') }}#contact">Help</a>
                    </div>
                    <p class="m-0">© All Rights Reserved. Designed by <a target="_blank" href="https://bijoylab.com">Bijoylab</a></p>
                </div>
            </div>
            <!-- Footer End -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script data-cfasync="false" src="{{ asset('assets/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/typed.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/easing.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/js/jqBootstrapValidation.min.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/contact.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}" type="ea6432c6f5a192569a79a65d-text/javascript"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="ea6432c6f5a192569a79a65d-|49" defer=""></script>

</body>

</html>

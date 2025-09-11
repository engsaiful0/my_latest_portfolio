<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Terms of Service - Saiful Islam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Terms of Service" name="keywords">
    <meta content="Terms of Service for Saiful Islam's Portfolio" name="description">

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
            <!-- Terms of Service Start -->
            <div class="container bg-white py-5">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Terms of Service</h2>
                        <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>
                    </div>
                    <div class="col-12">
                        <div class="terms-content">
                            <h4 class="text-primary mb-3">1. Acceptance of Terms</h4>
                            <p class="mb-4">
                                By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                            </p>

                            <h4 class="text-primary mb-3">2. Use License</h4>
                            <p class="mb-4">
                                Permission is granted to temporarily download one copy of the materials on this website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                            </p>
                            <ul class="mb-4">
                                <li>Modify or copy the materials</li>
                                <li>Use the materials for any commercial purpose or for any public display</li>
                                <li>Attempt to reverse engineer any software contained on the website</li>
                                <li>Remove any copyright or other proprietary notations from the materials</li>
                            </ul>

                            <h4 class="text-primary mb-3">3. Services Offered</h4>
                            <p class="mb-4">
                                Saiful Islam provides the following professional services:
                            </p>
                            <ul class="mb-4">
                                <li>Full-Stack Web Development (Python, Laravel, Node.js)</li>
                                <li>Mobile App Development (Flutter, React Native)</li>
                                <li>ERP and CRM System Development</li>
                                <li>E-commerce Platform Development</li>
                                <li>Cloud Deployment and DevOps Services</li>
                                <li>Technical Consulting and Project Management</li>
                            </ul>

                            <h4 class="text-primary mb-3">4. Client Responsibilities</h4>
                            <p class="mb-4">
                                Clients are responsible for:
                            </p>
                            <ul class="mb-4">
                                <li>Providing accurate and complete project requirements</li>
                                <li>Timely feedback and approval of deliverables</li>
                                <li>Payment according to agreed terms</li>
                                <li>Providing necessary access to systems and resources</li>
                                <li>Maintaining confidentiality of proprietary information</li>
                            </ul>

                            <h4 class="text-primary mb-3">5. Payment Terms</h4>
                            <p class="mb-4">
                                Payment terms will be specified in individual project agreements. Generally:
                            </p>
                            <ul class="mb-4">
                                <li>Projects may require upfront payment or milestone-based payments</li>
                                <li>Payment is due within 30 days of invoice date unless otherwise specified</li>
                                <li>Late payments may incur additional charges</li>
                                <li>All prices are in USD unless otherwise specified</li>
                            </ul>

                            <h4 class="text-primary mb-3">6. Intellectual Property</h4>
                            <p class="mb-4">
                                Unless otherwise specified in writing:
                            </p>
                            <ul class="mb-4">
                                <li>Client retains ownership of their proprietary content and data</li>
                                <li>Custom code developed specifically for the client becomes their property upon full payment</li>
                                <li>Saiful Islam retains rights to general methodologies, frameworks, and reusable code</li>
                                <li>Third-party libraries and tools remain under their respective licenses</li>
                            </ul>

                            <h4 class="text-primary mb-3">7. Confidentiality</h4>
                            <p class="mb-4">
                                Both parties agree to maintain strict confidentiality regarding:
                            </p>
                            <ul class="mb-4">
                                <li>Business strategies and proprietary information</li>
                                <li>Technical specifications and implementation details</li>
                                <li>Client data and user information</li>
                                <li>Any other information marked as confidential</li>
                            </ul>

                            <h4 class="text-primary mb-3">8. Limitation of Liability</h4>
                            <p class="mb-4">
                                In no event shall Saiful Islam be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your use of the service.
                            </p>

                            <h4 class="text-primary mb-3">9. Warranty Disclaimer</h4>
                            <p class="mb-4">
                                The information on this website is provided on an "as is" basis. To the fullest extent permitted by law, Saiful Islam excludes all representations, warranties, conditions and terms relating to this website and the use of this website.
                            </p>

                            <h4 class="text-primary mb-3">10. Project Timeline</h4>
                            <p class="mb-4">
                                Project timelines are estimates and may be affected by:
                            </p>
                            <ul class="mb-4">
                                <li>Client response time and feedback delays</li>
                                <li>Scope changes or additional requirements</li>
                                <li>Third-party dependencies and integrations</li>
                                <li>Technical complexity beyond initial assessment</li>
                            </ul>

                            <h4 class="text-primary mb-3">11. Termination</h4>
                            <p class="mb-4">
                                Either party may terminate a project agreement with written notice. Upon termination:
                            </p>
                            <ul class="mb-4">
                                <li>Payment is due for work completed up to the termination date</li>
                                <li>Client receives all deliverables completed to date</li>
                                <li>Confidentiality obligations continue to apply</li>
                                <li>Intellectual property rights are transferred as specified in the agreement</li>
                            </ul>

                            <h4 class="text-primary mb-3">12. Force Majeure</h4>
                            <p class="mb-4">
                                Neither party shall be liable for any failure or delay in performance due to circumstances beyond their reasonable control, including but not limited to acts of God, natural disasters, war, terrorism, or government actions.
                            </p>

                            <h4 class="text-primary mb-3">13. Governing Law</h4>
                            <p class="mb-4">
                                These terms shall be governed by and construed in accordance with the laws of Bangladesh, without regard to its conflict of law provisions.
                            </p>

                            <h4 class="text-primary mb-3">14. Changes to Terms</h4>
                            <p class="mb-4">
                                We reserve the right to modify these terms at any time. We will notify clients of any material changes via email or through our website. Continued use of our services constitutes acceptance of the modified terms.
                            </p>

                            <h4 class="text-primary mb-3">15. Contact Information</h4>
                            <p class="mb-4">
                                For questions about these terms, please contact us at:
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
            <!-- Terms of Service End -->

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Frequently Asked Questions - Saiful Islam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="FAQ, Frequently Asked Questions" name="keywords">
    <meta content="Frequently Asked Questions for Saiful Islam's Portfolio" name="description">

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
            <!-- FAQ Start -->
            <div class="container bg-white py-5">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Frequently Asked Questions</h2>
                        <p class="text-muted mb-4">Find answers to common questions about my services and expertise.</p>
                    </div>
                    <div class="col-12">
                        <div class="faq-content">
                            <!-- General Questions -->
                            <div class="faq-section mb-5">
                                <h4 class="text-primary mb-4"><i class="fas fa-question-circle me-2"></i>General Questions</h4>
                                
                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What services do you offer?</h5>
                                    <p class="mb-3">I provide comprehensive full-stack development services including:</p>
                                    <ul class="mb-3">
                                        <li>Web Application Development (Python, Laravel, Node.js)</li>
                                        <li>Mobile App Development (Flutter, React Native)</li>
                                        <li>ERP and CRM System Development</li>
                                        <li>E-commerce Platform Development</li>
                                        <li>Cloud Deployment and DevOps</li>
                                        <li>Technical Consulting and Project Management</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">How many years of experience do you have?</h5>
                                    <p>I have over 13 years of experience in full-stack development, working with various technologies and leading development teams across different industries.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Are you available for freelance projects?</h5>
                                    <p>Yes, I am available for freelance projects. I work remotely and can accommodate different time zones. Please contact me to discuss your project requirements.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What is your location and time zone?</h5>
                                    <p>I am based in Chattogram, Bangladesh (GMT+6). I work with clients globally and can adjust my schedule to accommodate different time zones.</p>
                                </div>
                            </div>

                            <!-- Technical Questions -->
                            <div class="faq-section mb-5">
                                <h4 class="text-primary mb-4"><i class="fas fa-code me-2"></i>Technical Questions</h4>
                                
                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What programming languages do you specialize in?</h5>
                                    <p class="mb-3">My primary expertise includes:</p>
                                    <ul class="mb-3">
                                        <li><strong>Backend:</strong> Python (FastAPI, Django), PHP (Laravel, CodeIgniter), Node.js</li>
                                        <li><strong>Frontend:</strong> JavaScript (React, Vue, Angular), HTML5, CSS3</li>
                                        <li><strong>Mobile:</strong> Flutter (Dart), React Native</li>
                                        <li><strong>Databases:</strong> MySQL, PostgreSQL, MongoDB, Oracle</li>
                                        <li><strong>Cloud:</strong> AWS, Azure, DigitalOcean</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Do you work with specific frameworks or technologies?</h5>
                                    <p class="mb-3">Yes, I have extensive experience with:</p>
                                    <ul class="mb-3">
                                        <li><strong>Web Frameworks:</strong> Laravel, Django, FastAPI, Express.js</li>
                                        <li><strong>Frontend Frameworks:</strong> React, Vue.js, Angular</li>
                                        <li><strong>Mobile Frameworks:</strong> Flutter, React Native</li>
                                        <li><strong>Cloud Platforms:</strong> AWS, Azure, DigitalOcean</li>
                                        <li><strong>DevOps Tools:</strong> Docker, CI/CD pipelines, Git</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Can you work with existing codebases?</h5>
                                    <p>Absolutely! I have extensive experience working with legacy systems, refactoring existing code, and integrating new features into established applications. I can quickly understand and work with various codebases and technologies.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Do you provide database design and optimization services?</h5>
                                    <p>Yes, I offer comprehensive database services including schema design, query optimization, performance tuning, and migration services for MySQL, PostgreSQL, MongoDB, and Oracle databases.</p>
                                </div>
                            </div>

                            <!-- Project Management Questions -->
                            <div class="faq-section mb-5">
                                <h4 class="text-primary mb-4"><i class="fas fa-project-diagram me-2"></i>Project Management</h4>
                                
                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">How do you handle project communication?</h5>
                                    <p>I maintain regular communication through email, video calls, and project management tools. I provide weekly progress updates, respond to queries within 24 hours, and use tools like Slack, Trello, or Jira for project coordination.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What is your typical project timeline?</h5>
                                    <p>Project timelines vary based on complexity and scope. Simple websites may take 2-4 weeks, while complex ERP systems can take 3-6 months. I provide detailed project estimates during the initial consultation and keep you updated on progress throughout the development process.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Do you provide project documentation?</h5>
                                    <p>Yes, I provide comprehensive documentation including technical specifications, user manuals, API documentation, and deployment guides. All code is well-commented and follows industry best practices.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">How do you handle project revisions and changes?</h5>
                                    <p>I understand that requirements may evolve during development. I accommodate reasonable changes within the project scope and discuss any major modifications that might affect timeline or budget before implementation.</p>
                                </div>
                            </div>

                            <!-- Pricing and Payment Questions -->
                            <div class="faq-section mb-5">
                                <h4 class="text-primary mb-4"><i class="fas fa-dollar-sign me-2"></i>Pricing and Payment</h4>
                                
                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What are your rates?</h5>
                                    <p>My rates vary based on project complexity, timeline, and requirements. I offer both hourly rates and fixed-price projects. Please contact me with your project details for a customized quote.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What payment methods do you accept?</h5>
                                    <p>I accept various payment methods including bank transfers, PayPal, and other digital payment platforms. Payment terms are typically 50% upfront and 50% upon project completion, though this can be adjusted based on project size and duration.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Do you offer maintenance and support services?</h5>
                                    <p>Yes, I provide ongoing maintenance and support services for all projects I develop. This includes bug fixes, updates, security patches, and feature enhancements. Support packages are available on a monthly or project basis.</p>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Is there a warranty on your work?</h5>
                                    <p>I provide a 90-day warranty on all development work, covering bug fixes and minor adjustments. This ensures your project works as specified and gives you peace of mind.</p>
                                </div>
                            </div>

                            <!-- Contact and Next Steps -->
                            <div class="faq-section mb-5">
                                <h4 class="text-primary mb-4"><i class="fas fa-phone me-2"></i>Getting Started</h4>
                                
                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">How do I get started with a project?</h5>
                                    <p class="mb-3">To get started, simply:</p>
                                    <ol class="mb-3">
                                        <li>Contact me via email or the contact form</li>
                                        <li>Describe your project requirements and goals</li>
                                        <li>Schedule a consultation call to discuss details</li>
                                        <li>Receive a detailed proposal and timeline</li>
                                        <li>Sign the agreement and begin development</li>
                                    </ol>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">What information should I provide for a project quote?</h5>
                                    <p class="mb-3">Please provide:</p>
                                    <ul class="mb-3">
                                        <li>Project description and objectives</li>
                                        <li>Target audience and platform requirements</li>
                                        <li>Desired features and functionality</li>
                                        <li>Timeline expectations</li>
                                        <li>Budget range (if applicable)</li>
                                        <li>Any existing systems or integrations needed</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-4">
                                    <h5 class="text-dark mb-3">Do you offer free consultations?</h5>
                                    <p>Yes, I offer free initial consultations to discuss your project requirements, provide technical advice, and determine if we're a good fit for your needs. This helps ensure we're aligned before starting any work.</p>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="contact-section bg-light p-4 rounded">
                                <h4 class="text-primary mb-3"><i class="fas fa-envelope me-2"></i>Still Have Questions?</h4>
                                <p class="mb-3">If you don't see your question answered here, please don't hesitate to contact me directly. I'm always happy to help and provide more detailed information about my services.</p>
                                <div class="contact-info">
                                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:saifuldev2011@gmail.com">saifuldev2011@gmail.com</a></p>
                                    <p class="mb-2"><strong>Phone:</strong> <a href="tel:+8801818650864">+8801818 650864</a></p>
                                    <p class="mb-2"><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/saiful-islam-684a97108/" target="_blank">Saiful Islam</a></p>
                                    <p class="mb-0"><strong>Location:</strong> Chattogram, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQ End -->

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Saiful Islam - Full Stack Software Engineer</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

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
                    <a href="#about" class="nav-item nav-link js-scroll-trigger">About</a>
                    <a href="#experience" class="nav-item nav-link js-scroll-trigger">Experience</a>
                    <a href="#service" class="nav-item nav-link js-scroll-trigger">Service</a>
                    <a href="#portfolio" class="nav-item nav-link js-scroll-trigger">Portfolio</a>
                    <a href="#contact" class="nav-item nav-link js-scroll-trigger">Contact</a>
                </div>
                <div class="d-flex justify-content-center mt-auto mb-3">
                    <a class="mx-2" target="_blank" href="https://x.com/appswebengineer"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.facebook.com/engrsaifulislamcse"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.linkedin.com/in/saiful-islam-684a97108/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="mx-2" target="_blank" href="https://github.com/engsaiful0"><i class="fab fa-github"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.youtube.com/@bijoyit"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="d-flex align-items-end justify-content-between">
                    <a href="{{ route('download.cv') }}" class="btn btn-block border-right">
                        <i class="fas fa-download me-2"></i>Download CV
                    </a>
                    <a href="#contact" class="btn btn-block btn-scroll js-scroll-trigger">Contact Me</a>
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
                        <!-- <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a> -->
                    </div>
                @endauth
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            <!-- About Start -->
            <div class="container bg-white py-5" id="about">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">About Me</h2>
                    </div>
                    <div class="col-12">
                        <p style="text-align: justify;">
                            <b>Full-Stack Software Engineer</b> with <b>13+ years of experience</b> delivering scalable
                            <b>ERP</b>, <b>e-commerce</b>, and <b>AI-powered applications</b>.
                            Specialized in <b>backend development</b> (<b>Python</b>, <b>Laravel</b>, <b>Node.js</b>)
                            and <b>mobile solutions</b> (<b>Flutter</b>, <b>React Native</b>).
                            Proven track record in <b>team leadership</b>, <b>system architecture</b>, and <b>cloud
                                deployment</b> (<b>AWS</b>, <b>Azure</b>, <b>DigitalOcean</b>).
                            Passionate about building <b>mission-critical systems</b> for <b>global clients</b>.
                        </p>

                        <div class="row">
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Name:</h5> Saiful Islam
                            </div>

                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Degree:</h5> PhD(Pursuing), M.Sc, B.Sc in Computer
                                Science and Engineering
                            </div>
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Experience:</h5> 13 Years
                            </div>
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Phone:</h5> +8801818 650864
                            </div>
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Email:</h5> <a href="/cdn-cgi/l/email-protection"
                                    class="__cf_email__">saifuldev2011@gmail.com</a>
                            </div>
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Address:</h5> Chattogram, Bangladesh
                            </div>
                            <div class="col-sm-6 py-1">
                                <h5 class="d-inline text-primary">Freelance:</h5> Available
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Skills Start -->
            <div class="container bg-white py-5">
    <div class="row px-3">
        <div class="col-12">
            <h2 class="title position-relative pb-2 mb-4">Skills</h2>
        </div>
        <div class="col-sm-6">
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Python (FastAPI, Django)</p>
                    <p class="mb-2">95%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Laravel / PHP</p>
                    <p class="mb-2">92%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="92"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Node.js</p>
                    <p class="mb-2">85%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">JavaScript (React, Vue, Angular)</p>
                    <p class="mb-2">90%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="90"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Flutter / Dart</p>
                    <p class="mb-2">90%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">React Native</p>
                    <p class="mb-2">85%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="85"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Cloud (AWS, Azure, DigitalOcean)</p>
                    <p class="mb-2">88%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="skill mb-4">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Databases (MySQL, PostgreSQL, MongoDB, Oracle)</p>
                    <p class="mb-2">90%</p>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Skills End -->


            <!-- Education Start -->
            <div class="container bg-white py-5" id="experience">
    <div class="row px-3">
        <div class="col-12">
            <h2 class="title position-relative pb-2 mb-4">Experience</h2>
        </div>
        <div class="col-12">
            <div class="border-left border-primary pt-2 pl-4 ml-2">

                <!-- Story Geny -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Team Lead</h5>
                    <p class="mb-2">Story Geny, Switzerland (Remote) | <small>Dec 2024 – May 2025</small></p>
                    <p>Led development of AI-powered applications using <b>Python FastAPI</b>, <b>Flutter</b>,
                       <b>React JS</b>, <b>Azure Cloud Services</b>, and <b>MongoDB</b>. Managed CI/CD pipelines and
                       team collaboration to deliver scalable solutions.</p>
                </div>

                <!-- Yiwubazaar -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Full Stack Engineer & Team Lead</h5>
                    <p class="mb-2">Yiwubazaar Ltd, China (Remote) | <small>Dec 2022 – Nov 2023</small></p>
                    <p>Developed <b>B2B e-commerce platforms</b> and led teams in building scalable solutions using
                       <b>Laravel</b>, <b>CodeIgniter</b>, <b>PHP</b>, <b>Angular</b>, <b>Vue</b>, <b>React</b>,
                       <b>React Native</b>, <b>Node.js</b>, and cloud platforms (<b>AWS</b>, <b>DigitalOcean</b>).</p>
                </div>

                <!-- Avitech Solutions -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Team Lead</h5>
                    <p class="mb-2">Avitech Solutions Ltd, UK (Remote) | <small>Mar 2022 – Dec 2022</small></p>
                    <p>Directed development of enterprise solutions with <b>Laravel</b>, <b>Python</b>,
                       <b>React</b>, <b>Node.js</b>, and cloud services. Oversaw project delivery, team management,
                       and deployment pipelines.</p>
                </div>

                <!-- Klouder Ltd -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Full Stack Software Engineer & Team Lead</h5>
                    <p class="mb-2">Klouder Ltd | <small>Apr 2019 – Feb 2022</small></p>
                    <p>Designed and developed business ERP systems with <b>Laravel</b>, <b>CodeIgniter</b>,
                       <b>Yii</b>, <b>React</b>, <b>Vue</b>, and <b>Node.js</b>. Led a remote team, ensuring smooth
                       project execution and delivery.</p>
                </div>

                <!-- Bijoy LAB -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Full Stack Software Engineer & Team Lead</h5>
                    <p class="mb-2">Bijoy LAB Web IT Solution Ltd | <small>Apr 2017 – Feb 2019</small></p>
                    <p>Built and maintained <b>ERP systems</b> for industries using <b>Laravel</b>, <b>CodeIgniter</b>,
                       <b>Vue</b>, <b>React</b>, and <b>Node.js</b>. Handled team leadership and client requirements.</p>
                </div>

                <!-- Logic Software Ltd -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Senior Software Engineer</h5>
                    <p class="mb-2">Logic Software Ltd, Dhaka | <small>Jan 2016 – Apr 2017</small></p>
                    <p>Developed industrial ERP software to control production and management. Designed
                       algorithms, ER diagrams, and executed project planning & coding.</p>
                </div>

                <!-- Zaman IT Ltd -->
                <div class="position-relative mb-4">
                    <i class="fa fa-arrow-right text-primary position-absolute"
                        style="top: 3px; left: -24px;"></i>
                    <h5 class="mb-1">Software Engineer</h5>
                    <p class="mb-2">Zaman IT Ltd, Dhaka | <small>Aug 2015 – Dec 2016</small></p>
                    <p>Developed custom business applications for clients. Responsible for algorithm design,
                       database design, and full-cycle development.</p>
                </div>

            </div>
        </div>
    </div>
</div>

            <!-- Education End -->


            <!-- Subscribe Start -->
            <div class="container bg-white py-5 px-0">
                <div class="bg-primary text-center p-5">
                    <h1 class="text-white font-weight-bold">Subscribe My Newsletter</h1>
                    <p class="text-white">Subscribe and get my latest article in your inbox</p>
                    <form id="subscriptionForm" class="form-inline justify-content-center">
                        @csrf
                        <div class="input-group">
                            <input type="email" id="subscriber_email" name="email" class="form-control border-0 p-4" placeholder="Your Email" required>
                            <input type="text" id="subscriber_name" name="name" class="form-control border-0 p-4" placeholder="Your Name (Optional)" style="display: none;">
                            <div class="input-group-append">
                                <button class="btn btn-dark px-4" type="submit" id="subscribeBtn">Subscribe</button>
                            </div>
                        </div>
                    </form>
                    <div id="subscriptionMessage" class="mt-3" style="display: none;"></div>
                </div>
            </div>
            <!-- Subscribe End -->


            <!-- Services Start -->
            <div class="container bg-white pt-5 pb-3" id="service">
    <div class="row px-3">
        <div class="col-12">
            <h2 class="title position-relative pb-2 mb-4">Services</h2>
        </div>

        <!-- Web & ERP Development -->
        <div class="col-md-6 service-item text-center mb-3">
            <i class="fa fa-2x fa-laptop-code mx-auto mb-4"></i>
            <h5 class="mb-2">Web & ERP Development</h5>
            <p>Custom <b>ERP</b>, <b>CRM</b>, and enterprise-grade web applications using <b>Python</b>, <b>Laravel</b>, and <b>Node.js</b> — scalable and secure solutions tailored to business needs.</p>
        </div>

        <!-- Mobile App Development -->
        <div class="col-md-6 service-item text-center mb-3">
            <i class="fab fa-2x fa-android mx-auto mb-4"></i>
            <h5 class="mb-2">Mobile App Development</h5>
            <p>Cross-platform apps for <b>Android</b> & <b>iOS</b> using <b>Flutter</b> and <b>React Native</b>, delivering seamless user experiences with modern UI/UX design.</p>
        </div>

        <!-- E-commerce Solutions -->
        <div class="col-md-6 service-item text-center mb-3">
            <i class="fa fa-2x fa-shopping-cart mx-auto mb-4"></i>
            <h5 class="mb-2">E-commerce Solutions</h5>
            <p>Design and development of <b>B2B/B2C e-commerce platforms</b>, including product management, payment gateway integration, multi-vendor systems, and marketplace apps.</p>
        </div>

        <!-- Cloud & DevOps -->
        <div class="col-md-6 service-item text-center mb-3">
            <i class="fa fa-2x fa-cloud mx-auto mb-4"></i>
            <h5 class="mb-2">Cloud & DevOps</h5>
            <p>Deployment and optimization on <b>AWS</b>, <b>Azure</b>, and <b>DigitalOcean</b> with CI/CD pipelines, ensuring performance, scalability, and high availability.</p>
        </div>

    </div>
</div>

            <!-- Services End -->


            <!-- Portfolio Start -->
            <div class="container bg-white pt-5 pb-3" id="portfolio">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Portfolio</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center mb-2">
                                <ul class="list-inline mb-4" id="portfolio-flters">
                                    <li class="btn btn-outline-primary active" data-filter="*"><i
                                            class="fa fa-star mr-2"></i>All</li>
                                    <li class="btn btn-outline-primary" data-filter=".first"><i
                                            class="fa fa-laptop-code mr-2"></i>Design</li>
                                    <li class="btn btn-outline-primary" data-filter=".second"><i
                                            class="fa fa-mobile-alt mr-2"></i>Development</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row portfolio-container">
                            @forelse($portfolios as $portfolio)
                                <div class="col-md-6 mb-4 portfolio-item {{ $portfolio->category }}">
                                    <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid w-100" src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}">
                                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                            <a href="{{ $portfolio->image_url }}" data-lightbox="portfolio">
                                                <i class="fa fa-4x fa-plus text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p class="text-muted">No portfolio items available at the moment.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio End -->


            <!-- Testimonial Start -->
            <div class="container bg-white py-5">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Testimonial</h2>
                    </div>
                    <div class="col-12">
                        @php
                            $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order')->get();
                        @endphp
                        
                        @if($testimonials->count() > 0)
                            <div class="owl-carousel testimonial-carousel">
                                @foreach($testimonials as $testimonial)
                                    <div class="text-left">
                                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                        <h4 class="text-body mb-4">{{ $testimonial->testimonial }}</h4>
                                        <div class="d-flex align-items-center">
                                            @if($testimonial->image)
                                                <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $testimonial->image) }}"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="fas fa-user fa-2x"></i>
                                                </div>
                                            @endif
                                            <div class="pl-3">
                                                <h5 class="text-primary m-0">{{ $testimonial->name }}</h5>
                                                @if($testimonial->position)
                                                    <i>{{ $testimonial->position }}</i>
                                                    @if($testimonial->company)
                                                        <br><small class="text-muted">{{ $testimonial->company }}</small>
                                                    @endif
                                                @endif
                                                <div class="mt-1">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $testimonial->rating)
                                                            <i class="fas fa-star text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-muted"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fa fa-3x fa-quote-left text-muted mb-4"></i>
                                <h4 class="text-muted">No Testimonials Available</h4>
                                <p class="text-muted">Testimonials will appear here once they are added.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->


            <!-- Contact Start -->
            <div class="container bg-white py-5" id="contact">
                <div class="row px-3">
                    <div class="col-12">
                        <h2 class="title position-relative pb-2 mb-4">Contact Me</h2>
                    </div>
                    <div class="col-12">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <input type="text" class="form-control p-4" id="name" name="name" placeholder="Your Name"
                                            required="required"
                                            data-validation-required-message="Please enter your name">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <input type="email" class="form-control p-4" id="email" name="email" placeholder="Your Email"
                                            required="required"
                                            data-validation-required-message="Please enter your email">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control p-4" id="subject" name="subject" placeholder="Subject"
                                        required="required" data-validation-required-message="Please enter a subject">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" name="message" placeholder="Message"
                                        required="required"
                                        data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Footer Start -->
            <div class="container-fluid bg-white pt-5 px-0">
                <div class="container bg-dark text-light text-center py-5">
                    <div class="d-flex justify-content-center mb-4">
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="https://github.com/engsaiful0"><i class="fab fa-github"></i></a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a class="text-white" href="{{ route('privacy') }}">Privacy</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="{{ route('terms') }}">Terms</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="{{ route('faq') }}">FAQs</a>
                        <span class="px-3">|</span>
                        <a class="text-white" href="#contact">Help</a>
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

    <!-- Subscription Form JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subscriptionForm = document.getElementById('subscriptionForm');
            const subscriptionMessage = document.getElementById('subscriptionMessage');
            const subscribeBtn = document.getElementById('subscribeBtn');
            const subscriberNameInput = document.getElementById('subscriber_name');
            const subscriberEmailInput = document.getElementById('subscriber_email');

            // Show name field when email is focused
            subscriberEmailInput.addEventListener('focus', function() {
                subscriberNameInput.style.display = 'block';
            });

            subscriptionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(subscriptionForm);
                const email = formData.get('email');
                const name = formData.get('name');

                // Disable submit button
                subscribeBtn.disabled = true;
                subscribeBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...';

                // Send AJAX request
                fetch('{{ route("subscribe") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        name: name
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        subscriptionMessage.innerHTML = '<div class="alert alert-success"><i class="fas fa-check-circle me-2"></i>' + data.message + '</div>';
                        subscriptionForm.reset();
                        subscriberNameInput.style.display = 'none';
                    } else {
                        subscriptionMessage.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>' + (data.message || 'Something went wrong. Please try again.') + '</div>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    subscriptionMessage.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Something went wrong. Please try again.</div>';
                })
                .finally(() => {
                    // Re-enable submit button
                    subscribeBtn.disabled = false;
                    subscribeBtn.innerHTML = 'Subscribe';
                    
                    // Show message
                    subscriptionMessage.style.display = 'block';
                    
                    // Hide message after 5 seconds
                    setTimeout(() => {
                        subscriptionMessage.style.display = 'none';
                    }, 5000);
                });
            });
        });
    </script>

    <!-- Contact Form JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const successDiv = document.getElementById('success');
            const sendMessageButton = document.getElementById('sendMessageButton');

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(contactForm);
                const name = formData.get('name');
                const email = formData.get('email');
                const subject = formData.get('subject');
                const message = formData.get('message');

                // Disable submit button
                sendMessageButton.disabled = true;
                sendMessageButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';

                // Send AJAX request
                fetch('{{ route("contact.submit") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        subject: subject,
                        message: message
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        successDiv.innerHTML = '<div class="alert alert-success"><i class="fas fa-check-circle me-2"></i>' + data.message + '</div>';
                        contactForm.reset();
                    } else {
                        successDiv.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>' + (data.message || 'Something went wrong. Please try again.') + '</div>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    successDiv.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Something went wrong. Please try again.</div>';
                })
                .finally(() => {
                    // Re-enable submit button
                    sendMessageButton.disabled = false;
                    sendMessageButton.innerHTML = 'Send Message';
                    
                    // Show message
                    successDiv.style.display = 'block';
                    
                    // Hide message after 5 seconds
                    setTimeout(() => {
                        successDiv.style.display = 'none';
                    }, 5000);
                });
            });
        });
    </script>

</body>

</html>

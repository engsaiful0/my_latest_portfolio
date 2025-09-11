<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Portfolio Admin</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
            display: block !important;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.2);
            transform: translateX(5px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }
        .sidebar .nav-link .badge {
            font-size: 0.7rem;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 500;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
            margin-left: 250px;
            transition: all 0.3s ease;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .badge {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 500;
        }
        .nav-header {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 20px;
            margin-bottom: 8px;
            padding: 0 20px;
        }
        .sidebar .nav-link .badge {
            font-size: 0.7rem;
            padding: 4px 8px;
            margin-left: auto;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 250px;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block !important;
            }
        }
        
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.5);
        }
        
        /* Animation for menu items */
        .sidebar .nav-item {
            animation: slideInLeft 0.3s ease forwards;
            opacity: 0;
        }
        .sidebar .nav-item:nth-child(1) { animation-delay: 0.1s; }
        .sidebar .nav-item:nth-child(2) { animation-delay: 0.2s; }
        .sidebar .nav-item:nth-child(3) { animation-delay: 0.3s; }
        .sidebar .nav-item:nth-child(4) { animation-delay: 0.4s; }
        .sidebar .nav-item:nth-child(5) { animation-delay: 0.5s; }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Search box styling */
        .sidebar-search {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-search input {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            border-radius: 20px;
            padding: 8px 15px;
        }
        .sidebar-search input::placeholder {
            color: rgba(255,255,255,0.6);
        }
        .sidebar-search input:focus {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
            box-shadow: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Mobile Toggle Button -->
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Sidebar -->
            <nav class="sidebar" id="sidebar">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Admin Panel
                        </h4>
                    </div>
                    
                    <!-- Search Box -->
                    <div class="sidebar-search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search menu..." id="menuSearch">
                            <span class="input-group-text bg-transparent border-0">
                                <i class="fas fa-search text-white-50"></i>
                            </span>
                        </div>
                    </div>
                    
                    <ul class="nav flex-column">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        
                        <!-- Content Management -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Content Management</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}" 
                               href="{{ route('admin.portfolio.index') }}">
                                <i class="fas fa-briefcase"></i>
                                Portfolio
                                @php
                                    $portfolioCount = \App\Models\Portfolio::count();
                                @endphp
                                @if($portfolioCount > 0)
                                    <span class="badge bg-primary ms-2">{{ $portfolioCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" 
                               href="{{ route('admin.testimonials.index') }}">
                                <i class="fas fa-quote-left"></i>
                                Testimonials
                                @php
                                    $testimonialCount = \App\Models\Testimonial::count();
                                @endphp
                                @if($testimonialCount > 0)
                                    <span class="badge bg-success ms-2">{{ $testimonialCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#blog">
                                <i class="fas fa-blog"></i>
                                Blog Posts
                                <span class="badge bg-info ms-2">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#pages">
                                <i class="fas fa-file-alt"></i>
                                Pages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" 
                               href="{{ route('admin.contacts.index') }}">
                                <i class="fas fa-envelope"></i>
                                Contact Messages
                                @php
                                    $contactCount = \App\Models\Contact::where('status', 'new')->count();
                                @endphp
                                @if($contactCount > 0)
                                    <span class="badge bg-danger ms-2">{{ $contactCount }}</span>
                                @endif
                            </a>
                        </li>
                        
                        <!-- Media Management -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Media</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#media">
                                <i class="fas fa-images"></i>
                                Media Library
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#gallery">
                                <i class="fas fa-photo-video"></i>
                                Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#uploads">
                                <i class="fas fa-upload"></i>
                                File Uploads
                            </a>
                        </li>
                        
                        <!-- User Management -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>User Management</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}" 
                               href="{{ route('admin.subscribers.index') }}">
                                <i class="fas fa-users"></i>
                                Subscribers
                                @php
                                    $subscriberCount = \App\Models\Subscriber::where('is_active', true)->count();
                                @endphp
                                @if($subscriberCount > 0)
                                    <span class="badge bg-success ms-2">{{ $subscriberCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#users">
                                <i class="fas fa-user-cog"></i>
                                Admin Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#roles">
                                <i class="fas fa-user-shield"></i>
                                Roles & Permissions
                            </a>
                        </li>
                        
                        <!-- Communication -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Communication</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#newsletter">
                                <i class="fas fa-envelope"></i>
                                Newsletter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#emails">
                                <i class="fas fa-mail-bulk"></i>
                                Email Templates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#notifications">
                                <i class="fas fa-bell"></i>
                                Notifications
                                <span class="badge bg-danger ms-2">0</span>
                            </a>
                        </li>
                        
                        <!-- Analytics & Reports -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Analytics</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#analytics">
                                <i class="fas fa-chart-bar"></i>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#statistics">
                                <i class="fas fa-chart-line"></i>
                                Statistics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#visitors">
                                <i class="fas fa-eye"></i>
                                Visitor Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#seo">
                                <i class="fas fa-search"></i>
                                SEO Analysis
                            </a>
                        </li>
                        
                        <!-- E-commerce (if applicable) -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>E-commerce</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#products">
                                <i class="fas fa-box"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#orders">
                                <i class="fas fa-shopping-cart"></i>
                                Orders
                                <span class="badge bg-warning ms-2">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#payments">
                                <i class="fas fa-credit-card"></i>
                                Payments
                            </a>
                        </li>
                        
                        <!-- System Management -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>System</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#settings">
                                <i class="fas fa-cog"></i>
                                General Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#appearance">
                                <i class="fas fa-palette"></i>
                                Appearance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#backup">
                                <i class="fas fa-database"></i>
                                Backup & Restore
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#logs">
                                <i class="fas fa-file-alt"></i>
                                System Logs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#maintenance">
                                <i class="fas fa-tools"></i>
                                Maintenance
                            </a>
                        </li>
                        
                        <!-- Security -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Security</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#security">
                                <i class="fas fa-shield-alt"></i>
                                Security Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#activity">
                                <i class="fas fa-history"></i>
                                Activity Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#firewall">
                                <i class="fas fa-fire"></i>
                                Firewall
                            </a>
                        </li>
                        
                        <!-- Frontend -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Frontend</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                                View Website
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#preview">
                                <i class="fas fa-eye"></i>
                                Preview Mode
                            </a>
                        </li>
                        
                        <!-- Help & Support -->
                        <li class="nav-item mt-3">
                            <h6 class="nav-header text-white-50 text-uppercase px-3 mt-4 mb-1">
                                <span>Help</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#help">
                                <i class="fas fa-question-circle"></i>
                                Help Center
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#documentation">
                                <i class="fas fa-book"></i>
                                Documentation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}#support">
                                <i class="fas fa-headset"></i>
                                Support
                            </a>
                        </li>
                        
                        <!-- Logout -->
                        <li class="nav-item mt-4">
                            <div class="px-3">
                                <hr class="text-white-50">
                            </div>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-start w-100 p-3 text-white border-0" 
                                        onclick="return confirm('Are you sure you want to logout and return to home page?')"
                                        style="background: rgba(220, 53, 69, 0.8); border-radius: 8px; transition: all 0.3s ease; font-weight: 600;">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                    <small class="d-block text-white-75 mt-1">Return to Home Page</small>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('page-title', 'Dashboard')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- Quick Logout Button -->
                        <div class="btn-group me-2">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to logout and return to home page?')"
                                        title="Logout and return to home page">
                                    <i class="fas fa-sign-out-alt me-1"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                        <div class="btn-group me-2">
                            <span class="badge bg-success">
                                <i class="fas fa-user me-1"></i>
                                {{ Auth::user()->name ?? 'Admin' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const menuSearch = document.getElementById('menuSearch');
            
            // Toggle sidebar on mobile
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });
            
            // Search functionality
            if (menuSearch) {
                menuSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const menuItems = document.querySelectorAll('.sidebar .nav-item');
                    
                    menuItems.forEach(function(item) {
                        const link = item.querySelector('.nav-link');
                        const text = link.textContent.toLowerCase();
                        
                        if (text.includes(searchTerm) || searchTerm === '') {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show');
                }
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>

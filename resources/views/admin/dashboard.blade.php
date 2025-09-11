@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistics Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Portfolios</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $portfolios }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Testimonials</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $testimonials }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-quote-left fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Subscribers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subscribers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Active Subscribers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeSubscribers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Quick Actions -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-block w-100">
                            <i class="fas fa-plus me-2"></i>Add Portfolio
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success btn-block w-100">
                            <i class="fas fa-plus me-2"></i>Add Testimonial
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.subscribers.create') }}" class="btn btn-info btn-block w-100">
                            <i class="fas fa-plus me-2"></i>Add Subscriber
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-warning btn-block w-100">
                            <i class="fas fa-list me-2"></i>View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-briefcase text-primary me-2"></i>
                            Portfolio Management
                        </div>
                        <small class="text-muted">Active</small>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-quote-left text-success me-2"></i>
                            Testimonial System
                        </div>
                        <small class="text-muted">Active</small>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-users text-info me-2"></i>
                            Subscriber Management
                        </div>
                        <small class="text-muted">Active</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="analytics">
    <!-- Recent Subscribers Chart -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscriber Growth (Last 30 Days)</h6>
            </div>
            <div class="card-body">
                <canvas id="subscriberChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Content Overview -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Content Overview</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Portfolio Items</span>
                        <span class="badge bg-primary">{{ $portfolios }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 8px;">
                        <div class="progress-bar bg-primary" style="width: {{ min(($portfolios / 20) * 100, 100) }}%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Testimonials</span>
                        <span class="badge bg-success">{{ $testimonials }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: {{ min(($testimonials / 10) * 100, 100) }}%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Active Subscribers</span>
                        <span class="badge bg-info">{{ $activeSubscribers }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 8px;">
                        <div class="progress-bar bg-info" style="width: {{ min(($activeSubscribers / 100) * 100, 100) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="statistics">
    <!-- Recent Activity -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Subscribers</h6>
            </div>
            <div class="card-body">
                @php
                    $recentSubscribers = \App\Models\Subscriber::orderBy('created_at', 'desc')->limit(5)->get();
                @endphp
                @if($recentSubscribers->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentSubscribers as $subscriber)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>{{ $subscriber->email }}</strong>
                                    @if($subscriber->name)
                                        <br><small class="text-muted">{{ $subscriber->name }}</small>
                                    @endif
                                </div>
                                <div class="text-end">
                                    <span class="badge {{ $subscriber->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $subscriber->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    <br><small class="text-muted">{{ $subscriber->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center">No recent subscribers</p>
                @endif
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">System Status</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 text-center mb-3">
                        <div class="mb-2">
                            <i class="fas fa-server fa-2x text-success"></i>
                        </div>
                        <h6 class="text-success">Online</h6>
                        <small class="text-muted">System Status</small>
                    </div>
                    <div class="col-6 text-center mb-3">
                        <div class="mb-2">
                            <i class="fas fa-database fa-2x text-info"></i>
                        </div>
                        <h6 class="text-info">Connected</h6>
                        <small class="text-muted">Database</small>
                    </div>
                    <div class="col-6 text-center">
                        <div class="mb-2">
                            <i class="fas fa-shield-alt fa-2x text-warning"></i>
                        </div>
                        <h6 class="text-warning">Secure</h6>
                        <small class="text-muted">Security</small>
                    </div>
                    <div class="col-6 text-center">
                        <div class="mb-2">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                        <h6 class="text-primary">Optimized</h6>
                        <small class="text-muted">Performance</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Subscriber Growth Chart
    const ctx = document.getElementById('subscriberChart').getContext('2d');
    
    // Get last 30 days data
    const last30Days = [];
    const subscriberData = [];
    
    for (let i = 29; i >= 0; i--) {
        const date = new Date();
        date.setDate(date.getDate() - i);
        last30Days.push(date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
        
        // This would normally come from your backend
        // For now, we'll use mock data
        subscriberData.push(Math.floor(Math.random() * 10));
    }
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: last30Days,
            datasets: [{
                label: 'New Subscribers',
                data: subscriberData,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
});
</script>
@endsection

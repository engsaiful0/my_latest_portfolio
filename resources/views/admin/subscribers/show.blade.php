@extends('admin.layout')

@section('title', 'View Subscriber')
@section('page-title', 'View Subscriber')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Subscriber Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                             style="width: 120px; height: 120px;">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $subscriber->name ?? 'No Name Provided' }}</h3>
                        <p class="text-muted">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:{{ $subscriber->email }}" class="text-decoration-none">
                                {{ $subscriber->email }}
                            </a>
                        </p>
                        
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if($subscriber->is_active)
                                <span class="badge bg-success ms-2">Active</span>
                            @else
                                <span class="badge bg-secondary ms-2">Inactive</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <strong>Subscriber ID:</strong>
                            <span class="ms-2">#{{ $subscriber->id }}</span>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-calendar-plus me-2"></i>
                                    Subscribed At
                                </h6>
                                <p class="card-text">
                                    {{ $subscriber->subscribed_at->format('M d, Y') }}
                                </p>
                                <small class="text-muted">
                                    {{ $subscriber->subscribed_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-calendar-edit me-2"></i>
                                    Last Updated
                                </h6>
                                <p class="card-text">
                                    {{ $subscriber->updated_at->format('M d, Y') }}
                                </p>
                                <small class="text-muted">
                                    {{ $subscriber->updated_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-clock me-2"></i>
                                    Subscription Duration
                                </h6>
                                <p class="card-text">
                                    {{ $subscriber->created_at->diffInDays(now()) }} days
                                </p>
                                <small class="text-muted">
                                    Since {{ $subscriber->created_at->format('M d, Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-bell me-2"></i>
                                    Notification Status
                                </h6>
                                <p class="card-text">
                                    @if($subscriber->is_active)
                                        <span class="text-success">Receiving notifications</span>
                                    @else
                                        <span class="text-muted">Notifications disabled</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" 
                       class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Subscriber
                    </a>
                    
                    <a href="mailto:{{ $subscriber->email }}" class="btn btn-info">
                        <i class="fas fa-envelope me-2"></i>Send Email
                    </a>
                    
                    <form action="{{ route('admin.subscribers.toggle-status', $subscriber->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        <button type="submit" 
                                class="btn {{ $subscriber->is_active ? 'btn-warning' : 'btn-success' }} w-100">
                            <i class="fas {{ $subscriber->is_active ? 'fa-pause' : 'fa-play' }} me-2"></i>
                            {{ $subscriber->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.subscribers.index') }}" 
                       class="btn btn-secondary">
                        <i class="fas fa-list me-2"></i>Back to List
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this subscriber? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Subscriber
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Stats</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h4 class="text-primary">{{ $subscriber->created_at->diffInDays(now()) }}</h4>
                            <small class="text-muted">Days Subscribed</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-info">
                            @if($subscriber->is_active)
                                <i class="fas fa-check-circle text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </h4>
                        <small class="text-muted">Status</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


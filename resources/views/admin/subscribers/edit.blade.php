@extends('admin.layout')

@section('title', 'Edit Subscriber')
@section('page-title', 'Edit Subscriber')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Subscriber Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.subscribers.update', $subscriber->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $subscriber->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $subscriber->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   {{ old('is_active', $subscriber->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (Subscriber will receive newsletters)
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Subscriber
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Subscriber Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Subscriber ID:</strong>
                    <span class="ms-2">{{ $subscriber->id }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Subscribed At:</strong>
                    <div class="ms-2">
                        {{ $subscriber->subscribed_at->format('M d, Y H:i') }}
                        <br>
                        <small class="text-muted">{{ $subscriber->subscribed_at->diffForHumans() }}</small>
                    </div>
                </div>
                
                <div class="mb-3">
                    <strong>Last Updated:</strong>
                    <div class="ms-2">
                        {{ $subscriber->updated_at->format('M d, Y H:i') }}
                        <br>
                        <small class="text-muted">{{ $subscriber->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
                
                <div class="mb-3">
                    <strong>Current Status:</strong>
                    <div class="ms-2">
                        @if($subscriber->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <form action="{{ route('admin.subscribers.toggle-status', $subscriber->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        <button type="submit" 
                                class="btn {{ $subscriber->is_active ? 'btn-warning' : 'btn-success' }} w-100">
                            <i class="fas {{ $subscriber->is_active ? 'fa-pause' : 'fa-play' }} me-2"></i>
                            {{ $subscriber->is_active ? 'Deactivate' : 'Activate' }} Subscriber
                        </button>
                    </form>
                    
                    <a href="mailto:{{ $subscriber->email }}" class="btn btn-info">
                        <i class="fas fa-envelope me-2"></i>Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


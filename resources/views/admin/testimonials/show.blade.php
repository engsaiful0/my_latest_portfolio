@extends('admin.layout')

@section('title', 'View Testimonial')
@section('page-title', 'View Testimonial')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Testimonial Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                 alt="{{ $testimonial->name }}" 
                                 class="rounded-circle img-fluid" 
                                 style="max-width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-user fa-4x text-white"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $testimonial->name }}</h3>
                        @if($testimonial->position)
                            <h5 class="text-primary">{{ $testimonial->position }}</h5>
                        @endif
                        @if($testimonial->company)
                            <p class="text-muted">{{ $testimonial->company }}</p>
                        @endif
                        
                        <div class="mb-3">
                            <strong>Rating:</strong>
                            <div class="mt-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                @endfor
                                <span class="ms-2">{{ $testimonial->rating }}/5</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if($testimonial->is_active)
                                <span class="badge bg-success ms-2">Active</span>
                            @else
                                <span class="badge bg-secondary ms-2">Inactive</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <strong>Sort Order:</strong>
                            <span class="ms-2">{{ $testimonial->sort_order }}</span>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="mb-4">
                    <h5>Testimonial</h5>
                    <div class="bg-light p-4 rounded">
                        <blockquote class="mb-0">
                            <i class="fas fa-quote-left text-primary me-2"></i>
                            {{ $testimonial->testimonial }}
                            <i class="fas fa-quote-right text-primary ms-2"></i>
                        </blockquote>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Created</h6>
                                <p class="card-text">
                                    <i class="fas fa-calendar me-2"></i>
                                    {{ $testimonial->created_at->format('M d, Y') }}
                                </p>
                                <small class="text-muted">
                                    {{ $testimonial->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Last Updated</h6>
                                <p class="card-text">
                                    <i class="fas fa-calendar me-2"></i>
                                    {{ $testimonial->updated_at->format('M d, Y') }}
                                </p>
                                <small class="text-muted">
                                    {{ $testimonial->updated_at->diffForHumans() }}
                                </small>
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
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                       class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Testimonial
                    </a>
                    
                    <a href="{{ route('admin.testimonials.index') }}" 
                       class="btn btn-secondary">
                        <i class="fas fa-list me-2"></i>Back to List
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this testimonial? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Testimonial
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
                            <h4 class="text-primary">{{ $testimonial->rating }}</h4>
                            <small class="text-muted">Rating</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-info">{{ $testimonial->sort_order }}</h4>
                        <small class="text-muted">Sort Order</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('admin.layout')

@section('title', 'View Portfolio Item')
@section('page-title', 'View Portfolio Item')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $portfolio->title }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Portfolio Image -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image me-2"></i>Portfolio Image
                        </h6>
                        <div class="btn-group">
                            <a href="{{ $portfolio->image_url }}" target="_blank" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-external-link-alt me-1"></i>View Full Size
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ $portfolio->image_url }}" class="img-fluid rounded" 
                             alt="{{ $portfolio->title }}" style="max-height: 500px; object-fit: cover;">
                    </div>
                </div>

                <!-- Portfolio Details -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-info-circle me-2"></i>Portfolio Details
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Title:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $portfolio->title }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Category:</strong>
                            </div>
                            <div class="col-sm-9">
                                <span class="badge bg-{{ $portfolio->category == 'design' ? 'info' : 'success' }}">
                                    <i class="fas fa-{{ $portfolio->category == 'design' ? 'paint-brush' : 'code' }} me-1"></i>
                                    {{ ucfirst($portfolio->category) }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Status:</strong>
                            </div>
                            <div class="col-sm-9">
                                <span class="badge bg-{{ $portfolio->is_active ? 'success' : 'secondary' }}">
                                    <i class="fas fa-{{ $portfolio->is_active ? 'check' : 'times' }} me-1"></i>
                                    {{ $portfolio->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Sort Order:</strong>
                            </div>
                            <div class="col-sm-9">
                                <span class="badge bg-light text-dark">{{ $portfolio->sort_order }}</span>
                            </div>
                        </div>

                        @if($portfolio->description)
                            <div class="row">
                                <div class="col-sm-3">
                                    <strong>Description:</strong>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted">{{ $portfolio->description }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-bolt me-2"></i>Quick Actions
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-1"></i>Edit Portfolio Item
                            </a>
                            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back to Portfolio
                            </a>
                            <a href="{{ route('welcome') }}" target="_blank" class="btn btn-outline-info">
                                <i class="fas fa-external-link-alt me-1"></i>View on Website
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Statistics -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-chart-bar me-2"></i>Statistics
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-end">
                                    <h6 class="text-muted mb-1">Created</h6>
                                    <small class="text-dark">{{ $portfolio->created_at->format('M d, Y') }}</small>
                                    <br><small class="text-muted">{{ $portfolio->created_at->format('g:i A') }}</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <h6 class="text-muted mb-1">Last Updated</h6>
                                <small class="text-dark">{{ $portfolio->updated_at->format('M d, Y') }}</small>
                                <br><small class="text-muted">{{ $portfolio->updated_at->format('g:i A') }}</small>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row text-center">
                            <div class="col-6">
                                <h6 class="text-muted mb-1">Days Active</h6>
                                <small class="text-dark">{{ $portfolio->created_at->diffInDays(now()) }} days</small>
                            </div>
                            <div class="col-6">
                                <h6 class="text-muted mb-1">Status</h6>
                                <small class="text-{{ $portfolio->is_active ? 'success' : 'muted' }}">
                                    {{ $portfolio->is_active ? 'Live' : 'Draft' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-file-image me-2"></i>Image Information
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>File Path:</strong>
                            <br><small class="text-muted">{{ $portfolio->image_path }}</small>
                        </div>
                        
                        <div class="mb-2">
                            <strong>Image URL:</strong>
                            <br><small class="text-muted">
                                <a href="{{ asset('public/storage/' . $portfolio->image_path) }}" target="_blank" class="text-decoration-none">
                                    {{ asset('public/storage/' . $portfolio->image_path) }}
                                </a>
                            </small>
                        </div>
                        
                        <div class="text-center">
                            <a href="{{ asset('public/storage/' . $portfolio->image_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-download me-1"></i>Download Image
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h6 class="m-0 font-weight-bold">
                            <i class="fas fa-exclamation-triangle me-2"></i>Danger Zone
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text small text-muted">
                            Once you delete a portfolio item, there is no going back. Please be certain.
                        </p>
                        <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" 
                              class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio item? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                <i class="fas fa-trash me-1"></i>Delete Portfolio Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

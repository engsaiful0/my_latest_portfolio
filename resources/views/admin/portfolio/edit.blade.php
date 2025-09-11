@extends('admin.layout')

@section('title', 'Edit Portfolio Item')
@section('page-title', 'Edit Portfolio Item')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit: {{ $portfolio->title }}</li>
            </ol>
        </nav>

        <!-- Form Card -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit me-2"></i>Edit Portfolio Item
                </h6>
                <div class="btn-group">
                    <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye me-1"></i>View
                    </a>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Back to Portfolio
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" enctype="multipart/form-data" id="portfolioForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-info-circle me-2"></i>Basic Information
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">
                                                    Title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                                       id="title" name="title" value="{{ old('title', $portfolio->title) }}" 
                                                       placeholder="Enter portfolio item title" required>
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $error }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">
                                                    Category <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select @error('category') is-invalid @enderror" 
                                                        id="category" name="category" required>
                                                    <option value="">Select Category</option>
                                                    <option value="design" {{ old('category', $portfolio->category) == 'design' ? 'selected' : '' }}>
                                                        Design
                                                    </option>
                                                    <option value="development" {{ old('category', $portfolio->category) == 'development' ? 'selected' : '' }}>
                                                        Development
                                                    </option>
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $error }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="4" 
                                                  placeholder="Enter a detailed description for this portfolio item">{{ old('description', $portfolio->description) }}</textarea>
                                        <div class="form-text">Provide a compelling description that showcases your work.</div>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Image Management -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-image me-2"></i>Portfolio Image
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <!-- Current Image -->
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label>
                                        <div class="text-center">
                                            <img src="{{ $portfolio->image_url }}" class="img-thumbnail" 
                                                 alt="{{ $portfolio->title }}" 
                                                 style="max-width: 300px; max-height: 200px; object-fit: cover;">
                                            <div class="mt-2">
                                                <small class="text-muted">{{ $portfolio->image_path }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- New Image Upload -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">
                                            Replace Image (Optional)
                                        </label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*" onchange="previewImage(this)">
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Leave empty to keep current image. Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @enderror
                                    </div>

                                    <!-- New Image Preview -->
                                    <div class="mb-3" id="imagePreview" style="display: none;">
                                        <label class="form-label">New Image Preview</label>
                                        <div class="text-center">
                                            <img id="previewImg" class="img-thumbnail" alt="Preview" 
                                                 style="max-width: 300px; max-height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Settings & Actions -->
                        <div class="col-lg-4">
                            <!-- Status Settings -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-cog me-2"></i>Settings
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   value="1" {{ old('is_active', $portfolio->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                <strong>Active Status</strong>
                                                <br><small class="text-muted">Make this portfolio item visible on the website</small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control" id="sort_order" name="sort_order" 
                                               value="{{ old('sort_order', $portfolio->sort_order) }}" 
                                               min="1" placeholder="Display order">
                                        <div class="form-text">Lower numbers appear first</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Portfolio Info -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-info me-2"></i>Portfolio Info
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <div class="border-end">
                                                <h6 class="text-muted mb-1">Created</h6>
                                                <small class="text-dark">{{ $portfolio->created_at->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-muted mb-1">Last Updated</h6>
                                            <small class="text-dark">{{ $portfolio->updated_at->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-bolt me-2"></i>Quick Actions
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i>Update Portfolio Item
                                        </button>
                                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-times me-1"></i>Cancel
                                        </a>
                                        <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="btn btn-outline-info">
                                            <i class="fas fa-eye me-1"></i>Preview Changes
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
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Form validation
document.getElementById('portfolioForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const category = document.getElementById('category').value;
    
    if (!title) {
        e.preventDefault();
        alert('Please enter a title for the portfolio item.');
        document.getElementById('title').focus();
        return;
    }
    
    if (!category) {
        e.preventDefault();
        alert('Please select a category.');
        document.getElementById('category').focus();
        return;
    }
});
</script>
@endsection

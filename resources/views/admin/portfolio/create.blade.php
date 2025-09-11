@extends('admin.layout')

@section('title', 'Add Portfolio Item')
@section('page-title', 'Add Portfolio Item')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Item</li>
            </ol>
        </nav>

        <!-- Form Card -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-plus-circle me-2"></i>Add New Portfolio Item
                </h6>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Back to Portfolio
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data" id="portfolioForm">
                    @csrf
                    
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
                                                       id="title" name="title" value="{{ old('title') }}" 
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
                                                    <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>
                                                        <i class="fas fa-paint-brush me-1"></i>Design
                                                    </option>
                                                    <option value="development" {{ old('category') == 'development' ? 'selected' : '' }}>
                                                        <i class="fas fa-code me-1"></i>Development
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
                                                  placeholder="Enter a detailed description for this portfolio item">{{ old('description') }}</textarea>
                                        <div class="form-text">Provide a compelling description that showcases your work.</div>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-image me-2"></i>Portfolio Image
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">
                                            Image <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*" required onchange="previewImage(this)">
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB. Recommended size: 800x600px
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3" id="imagePreview" style="display: none;">
                                        <label class="form-label">Image Preview</label>
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
                                                   value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                <strong>Active Status</strong>
                                                <br><small class="text-muted">Make this portfolio item visible on the website</small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control" id="sort_order" name="sort_order" 
                                               value="{{ old('sort_order', \App\Models\Portfolio::max('sort_order') + 1) }}" 
                                               min="1" placeholder="Display order">
                                        <div class="form-text">Lower numbers appear first</div>
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
                                            <i class="fas fa-save me-1"></i>Create Portfolio Item
                                        </button>
                                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-times me-1"></i>Cancel
                                        </a>
                                        <button type="button" class="btn btn-outline-info" onclick="clearForm()">
                                            <i class="fas fa-undo me-1"></i>Clear Form
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Help -->
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-question-circle me-2"></i>Tips
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-lightbulb text-warning me-2"></i>
                                            Use descriptive titles
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-lightbulb text-warning me-2"></i>
                                            High-quality images work best
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-lightbulb text-warning me-2"></i>
                                            Write compelling descriptions
                                        </li>
                                        <li>
                                            <i class="fas fa-lightbulb text-warning me-2"></i>
                                            Choose appropriate categories
                                        </li>
                                    </ul>
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

function clearForm() {
    if (confirm('Are you sure you want to clear all form data?')) {
        document.getElementById('portfolioForm').reset();
        document.getElementById('imagePreview').style.display = 'none';
    }
}

// Form validation
document.getElementById('portfolioForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const category = document.getElementById('category').value;
    const image = document.getElementById('image').files[0];
    
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
    
    if (!image) {
        e.preventDefault();
        alert('Please select an image for the portfolio item.');
        document.getElementById('image').focus();
        return;
    }
});
</script>
@endsection

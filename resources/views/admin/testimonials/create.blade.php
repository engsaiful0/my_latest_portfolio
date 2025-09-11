@extends('admin.layout')

@section('title', 'Create Testimonial')
@section('page-title', 'Create New Testimonial')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Testimonial Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                   id="position" name="position" value="{{ old('position') }}">
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" 
                                   id="company" name="company" value="{{ old('company') }}">
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                            <select class="form-select @error('rating') is-invalid @enderror" 
                                    id="rating" name="rating" required>
                                <option value="">Select Rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                    </option>
                                @endfor
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="testimonial" class="form-label">Testimonial <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('testimonial') is-invalid @enderror" 
                                  id="testimonial" name="testimonial" rows="4" required>{{ old('testimonial') }}</textarea>
                        @error('testimonial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <div class="form-text">Recommended size: 200x200px. Max size: 2MB</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (Show on frontend)
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Testimonial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Preview</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>
                    <h6 id="preview-name">Name will appear here</h6>
                    <p class="text-muted mb-2" id="preview-position">Position/Company</p>
                    <div id="preview-rating" class="mb-3">
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                    </div>
                    <p class="text-muted" id="preview-testimonial">Testimonial text will appear here...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview functionality
    const nameInput = document.getElementById('name');
    const positionInput = document.getElementById('position');
    const companyInput = document.getElementById('company');
    const ratingSelect = document.getElementById('rating');
    const testimonialTextarea = document.getElementById('testimonial');
    const imageInput = document.getElementById('image');
    
    const previewName = document.getElementById('preview-name');
    const previewPosition = document.getElementById('preview-position');
    const previewRating = document.getElementById('preview-rating');
    const previewTestimonial = document.getElementById('preview-testimonial');
    
    function updatePreview() {
        previewName.textContent = nameInput.value || 'Name will appear here';
        
        let positionText = '';
        if (positionInput.value) positionText += positionInput.value;
        if (companyInput.value) positionText += (positionText ? ' at ' : '') + companyInput.value;
        previewPosition.textContent = positionText || 'Position/Company';
        
        const rating = parseInt(ratingSelect.value) || 0;
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= rating) {
                starsHtml += '<i class="fas fa-star text-warning"></i>';
            } else {
                starsHtml += '<i class="far fa-star text-muted"></i>';
            }
        }
        previewRating.innerHTML = starsHtml;
        
        previewTestimonial.textContent = testimonialTextarea.value || 'Testimonial text will appear here...';
    }
    
    nameInput.addEventListener('input', updatePreview);
    positionInput.addEventListener('input', updatePreview);
    companyInput.addEventListener('input', updatePreview);
    ratingSelect.addEventListener('change', updatePreview);
    testimonialTextarea.addEventListener('input', updatePreview);
    
    // Image preview
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.querySelector('.bg-secondary');
                previewImg.innerHTML = `<img src="${e.target.result}" class="rounded-circle" width="80" height="80" style="object-fit: cover;">`;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection


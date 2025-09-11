@extends('admin.layout')

@section('title', 'Testimonials')
@section('page-title', 'Testimonials Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Testimonials Management</h2>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Testimonial
    </a>
</div>

<!-- Filter and Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.testimonials.index') }}" class="row g-3">
            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" class="form-select">
                    <option value="">All Ratings</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <label for="search" class="form-label">Search</label>
                <input type="text" name="search" class="form-control" 
                       placeholder="Search by name, position, company, or testimonial..." 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i>
                    </button>
                    @if(request('status') || request('rating') || request('search'))
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Actions -->
<div class="card mb-4" id="bulkActionsCard" style="display: none;">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <span id="selectedCount">0</span> testimonial(s) selected
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm" onclick="bulkUpdateStatus(true)">
                    <i class="fas fa-check me-1"></i>Activate Selected
                </button>
                <button type="button" class="btn btn-warning btn-sm" onclick="bulkUpdateStatus(false)">
                    <i class="fas fa-pause me-1"></i>Deactivate Selected
                </button>
                <button type="button" class="btn btn-danger btn-sm" onclick="bulkDelete()">
                    <i class="fas fa-trash me-1"></i>Delete Selected
                </button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($testimonials->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position/Company</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Sort Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input testimonial-checkbox" 
                                           value="{{ $testimonial->id }}">
                                </td>
                                <td>{{ $testimonial->id }}</td>
                                <td>
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                             alt="{{ $testimonial->name }}" 
                                             class="rounded-circle" 
                                             width="40" height="40">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $testimonial->name }}</td>
                                <td>
                                    @if($testimonial->position)
                                        <strong>{{ $testimonial->position }}</strong><br>
                                    @endif
                                    @if($testimonial->company)
                                        <small class="text-muted">{{ $testimonial->company }}</small>
                                    @endif
                                </td>
                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-muted"></i>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    @if($testimonial->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $testimonial->sort_order }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" 
                                           class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                                           class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm {{ $testimonial->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}" 
                                                onclick="toggleStatus({{ $testimonial->id }})" 
                                                title="{{ $testimonial->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas {{ $testimonial->is_active ? 'fa-pause' : 'fa-play' }}"></i>
                                        </button>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($testimonials->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $testimonials->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-quote-left fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No Testimonials Found</h4>
                <p class="text-muted">
                    @if(request('status') || request('rating') || request('search'))
                        No testimonials match your current filters.
                    @else
                        Start by adding your first testimonial.
                    @endif
                </p>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Testimonial
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const testimonialCheckboxes = document.querySelectorAll('.testimonial-checkbox');
    const bulkActionsCard = document.getElementById('bulkActionsCard');
    const selectedCountSpan = document.getElementById('selectedCount');

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        testimonialCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkActions();
    });

    // Individual checkbox functionality
    testimonialCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateBulkActions();
            updateSelectAllState();
        });
    });

    function updateBulkActions() {
        const selectedCheckboxes = document.querySelectorAll('.testimonial-checkbox:checked');
        const count = selectedCheckboxes.length;
        
        selectedCountSpan.textContent = count;
        
        if (count > 0) {
            bulkActionsCard.style.display = 'block';
        } else {
            bulkActionsCard.style.display = 'none';
        }
    }

    function updateSelectAllState() {
        const totalCheckboxes = testimonialCheckboxes.length;
        const checkedCheckboxes = document.querySelectorAll('.testimonial-checkbox:checked').length;
        
        if (checkedCheckboxes === 0) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = false;
        } else if (checkedCheckboxes === totalCheckboxes) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.indeterminate = true;
        }
    }
});

// Toggle status function
function toggleStatus(testimonialId) {
    fetch(`/admin/testimonials/${testimonialId}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the status.');
    });
}

// Bulk update status function
function bulkUpdateStatus(status) {
    const selectedCheckboxes = document.querySelectorAll('.testimonial-checkbox:checked');
    const testimonialIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
    
    if (testimonialIds.length === 0) {
        alert('Please select at least one testimonial.');
        return;
    }
    
    const action = status ? 'activate' : 'deactivate';
    if (!confirm(`Are you sure you want to ${action} ${testimonialIds.length} testimonial(s)?`)) {
        return;
    }
    
    fetch('/admin/testimonials/bulk-update-status', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            testimonial_ids: testimonialIds,
            status: status
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the status.');
    });
}

// Bulk delete function
function bulkDelete() {
    const selectedCheckboxes = document.querySelectorAll('.testimonial-checkbox:checked');
    const testimonialIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
    
    if (testimonialIds.length === 0) {
        alert('Please select at least one testimonial.');
        return;
    }
    
    if (!confirm(`Are you sure you want to delete ${testimonialIds.length} testimonial(s)? This action cannot be undone.`)) {
        return;
    }
    
    fetch('/admin/testimonials/bulk-delete', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            testimonial_ids: testimonialIds
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting testimonials.');
    });
}
</script>
@endsection


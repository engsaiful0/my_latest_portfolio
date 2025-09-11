@extends('admin.layout')

@section('title', 'Subscribers')
@section('page-title', 'Subscribers Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Subscribers</h2>
    <div class="btn-group">
        <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Subscriber
        </a>
        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
            <i class="fas fa-download me-2"></i>Export
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="exportSubscribers('csv')"><i class="fas fa-file-csv me-2"></i>Export as CSV</a></li>
            <li><a class="dropdown-item" href="#" onclick="exportSubscribers('excel')"><i class="fas fa-file-excel me-2"></i>Export as Excel</a></li>
        </ul>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.subscribers.index') }}" class="row g-3">
            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="search" class="form-label">Search</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search by email or name" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label for="date_from" class="form-label">From Date</label>
                <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-3">
                <label for="date_to" class="form-label">To Date</label>
                <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search me-2"></i>Filter
                </button>
                <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Clear
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($subscribers->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Subscribed At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->id }}</td>
                                <td>
                                    <a href="mailto:{{ $subscriber->email }}" class="text-decoration-none">
                                        {{ $subscriber->email }}
                                    </a>
                                </td>
                                <td>{{ $subscriber->name ?? 'N/A' }}</td>
                                <td>
                                    @if($subscriber->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $subscriber->subscribed_at->format('M d, Y') }}
                                    <br>
                                    <small class="text-muted">{{ $subscriber->subscribed_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.subscribers.show', $subscriber->id) }}" 
                                           class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" 
                                           class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.subscribers.toggle-status', $subscriber->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $subscriber->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}" 
                                                    title="{{ $subscriber->is_active ? 'Deactivate' : 'Activate' }}">
                                                <i class="fas {{ $subscriber->is_active ? 'fa-pause' : 'fa-play' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this subscriber?')">
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
            <div class="d-flex justify-content-center mt-4">
                {{ $subscribers->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No Subscribers Found</h4>
                <p class="text-muted">No one has subscribed yet. Share your newsletter to get subscribers!</p>
                <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Subscriber
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $subscribers->total() }}</h4>
                        <p class="mb-0">Total Subscribers</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $subscribers->where('is_active', true)->count() }}</h4>
                        <p class="mb-0">Active Subscribers</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-check fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $subscribers->where('is_active', false)->count() }}</h4>
                        <p class="mb-0">Inactive Subscribers</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-times fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $subscribers->where('created_at', '>=', now()->subDays(7))->count() }}</h4>
                        <p class="mb-0">This Week</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calendar-week fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function exportSubscribers(format) {
    const params = new URLSearchParams(window.location.search);
    params.set('export', format);
    window.location.href = '{{ route("admin.subscribers.index") }}?' + params.toString();
}
</script>
@endsection

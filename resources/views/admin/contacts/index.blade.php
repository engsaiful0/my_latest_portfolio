@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Contact Messages</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter and Search -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form method="GET" action="{{ route('admin.contacts.index') }}" class="form-inline">
                                <div class="form-group mr-2">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="">All Status</option>
                                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                                        <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                                <div class="form-group mr-2">
                                    <input type="text" name="search" class="form-control form-control-sm" 
                                           placeholder="Search by name, email, or subject" 
                                           value="{{ request('search') }}">
                                </div>
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                                @if(request('status') || request('search'))
                                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary ml-1">
                                        <i class="fas fa-times"></i> Clear
                                    </a>
                                @endif
                            </form>
                        </div>
                        <div class="col-md-6 text-right">
                            <small class="text-muted">
                                Showing {{ $contacts->firstItem() ?? 0 }} to {{ $contacts->lastItem() ?? 0 }} 
                                of {{ $contacts->total() }} messages
                            </small>
                        </div>
                    </div>

                    <!-- Messages Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                    <tr class="{{ $contact->status === 'new' ? 'table-warning' : '' }}">
                                        <td>{{ $contact->id }}</td>
                                        <td>
                                            <strong>{{ $contact->name }}</strong>
                                            @if($contact->status === 'new')
                                                <span class="badge badge-danger badge-sm ml-1">NEW</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-inline-block" style="max-width: 200px;" 
                                                  title="{{ $contact->subject }}">
                                                {{ $contact->subject }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $contact->status_badge_class }}">
                                                {{ $contact->status_display }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $contact->created_at->format('M d, Y') }}<br>
                                                {{ $contact->created_at->format('h:i A') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.contacts.show', $contact) }}" 
                                                   class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.contacts.edit', $contact) }}" 
                                                   class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" 
                                                      class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact message?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">No contact messages found</h5>
                                            <p class="text-muted">
                                                @if(request('status') || request('search'))
                                                    No messages match your current filters.
                                                @else
                                                    No contact messages have been received yet.
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($contacts->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $contacts->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-refresh for new messages (optional)
    setInterval(function() {
        // You can add AJAX call here to check for new messages
        // and update the page if needed
    }, 30000); // Check every 30 seconds
</script>
@endsection

@extends('admin.layout')

@section('title', 'View Contact Message')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Contact Message #{{ $contact->id }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                        <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Message Details -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Message Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3"><strong>Name:</strong></div>
                                        <div class="col-sm-9">{{ $contact->name }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"><strong>Email:</strong></div>
                                        <div class="col-sm-9">
                                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"><strong>Subject:</strong></div>
                                        <div class="col-sm-9">{{ $contact->subject }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"><strong>Message:</strong></div>
                                        <div class="col-sm-9">
                                            <div class="border p-3 rounded bg-light">
                                                {!! nl2br(e($contact->message)) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"><strong>Status:</strong></div>
                                        <div class="col-sm-9">
                                            <span class="badge {{ $contact->status_badge_class }} badge-lg">
                                                {{ $contact->status_display }}
                                            </span>
                                        </div>
                                    </div>
                                    @if($contact->admin_notes)
                                        <div class="row mb-3">
                                            <div class="col-sm-3"><strong>Admin Notes:</strong></div>
                                            <div class="col-sm-9">
                                                <div class="border p-3 rounded bg-warning bg-opacity-10">
                                                    {!! nl2br(e($contact->admin_notes)) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Contact Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Contact Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Contact ID:</strong><br>
                                        <span class="text-muted">#{{ $contact->id }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Submitted:</strong><br>
                                        <span class="text-muted">
                                            {{ $contact->created_at->format('M d, Y h:i A') }}<br>
                                            <small>({{ $contact->created_at->diffForHumans() }})</small>
                                        </span>
                                    </div>
                                    @if($contact->read_at)
                                        <div class="mb-3">
                                            <strong>Read At:</strong><br>
                                            <span class="text-muted">
                                                {{ $contact->read_at->format('M d, Y h:i A') }}<br>
                                                <small>({{ $contact->read_at->diffForHumans() }})</small>
                                            </span>
                                        </div>
                                    @endif
                                    @if($contact->replied_at)
                                        <div class="mb-3">
                                            <strong>Replied At:</strong><br>
                                            <span class="text-muted">
                                                {{ $contact->replied_at->format('M d, Y h:i A') }}<br>
                                                <small>({{ $contact->replied_at->diffForHumans() }})</small>
                                            </span>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <strong>Last Updated:</strong><br>
                                        <span class="text-muted">
                                            {{ $contact->updated_at->format('M d, Y h:i A') }}<br>
                                            <small>({{ $contact->updated_at->diffForHumans() }})</small>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        @if($contact->status === 'new')
                                            <button type="button" class="btn btn-warning btn-sm" 
                                                    onclick="updateStatus('read')">
                                                <i class="fas fa-eye"></i> Mark as Read
                                            </button>
                                        @endif
                                        @if($contact->status !== 'replied')
                                            <button type="button" class="btn btn-success btn-sm" 
                                                    onclick="updateStatus('replied')">
                                                <i class="fas fa-reply"></i> Mark as Replied
                                            </button>
                                        @endif
                                        @if($contact->status !== 'closed')
                                            <button type="button" class="btn btn-secondary btn-sm" 
                                                    onclick="updateStatus('closed')">
                                                <i class="fas fa-lock"></i> Close Message
                                            </button>
                                        @endif
                                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-envelope"></i> Reply via Email
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function updateStatus(status) {
    if (confirm('Are you sure you want to update the status to ' + status + '?')) {
        fetch('{{ route("admin.contacts.update-status", $contact) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error updating status: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the status.');
        });
    }
}
</script>
@endsection

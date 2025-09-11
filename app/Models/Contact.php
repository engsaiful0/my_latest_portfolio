<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'admin_notes',
        'read_at',
        'replied_at'
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    // Scope for filtering by status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope for unread messages
    public function scopeUnread($query)
    {
        return $query->where('status', 'new');
    }

    // Scope for read messages
    public function scopeRead($query)
    {
        return $query->whereIn('status', ['read', 'replied', 'closed']);
    }

    // Mark as read
    public function markAsRead()
    {
        $this->update([
            'status' => 'read',
            'read_at' => now()
        ]);
    }

    // Mark as replied
    public function markAsReplied()
    {
        $this->update([
            'status' => 'replied',
            'replied_at' => now()
        ]);
    }

    // Mark as closed
    public function markAsClosed()
    {
        $this->update([
            'status' => 'closed'
        ]);
    }

    // Get status badge class
    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'new' => 'badge-danger',
            'read' => 'badge-warning',
            'replied' => 'badge-success',
            'closed' => 'badge-secondary',
            default => 'badge-light'
        };
    }

    // Get status display text
    public function getStatusDisplayAttribute()
    {
        return match($this->status) {
            'new' => 'New',
            'read' => 'Read',
            'replied' => 'Replied',
            'closed' => 'Closed',
            default => 'Unknown'
        };
    }
}

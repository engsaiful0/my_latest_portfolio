@extends('admin.layout')

@section('title', 'Portfolio Management')
@section('page-title', 'Portfolio Management')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Portfolio Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Items</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $portfolios->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Active Items</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $portfolios->where('is_active', true)->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Design Items</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $portfolios->where('category', 'design')->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paint-brush fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Development Items</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $portfolios->where('category', 'development')->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-code fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-images me-2"></i>Portfolio Items
                </h6>
                <div class="btn-toolbar">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filter' => 'all']) }}">All Items</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filter' => 'active']) }}">Active Only</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filter' => 'inactive']) }}">Inactive Only</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filter' => 'design']) }}">Design</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filter' => 'development']) }}">Development</a></li>
                        </ul>
                    </div>
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-download me-1"></i>Export
                        </button>
                    </div>
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Add New Item
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($portfolios->count() > 0)
                    <!-- Table View -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="portfolioTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>
                                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" 
                                                 class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $portfolio->title }}</strong>
                                                @if($portfolio->description)
                                                    <br><small class="text-muted">{{ Str::limit($portfolio->description, 50) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $portfolio->category == 'design' ? 'info' : 'success' }}">
                                                <i class="fas fa-{{ $portfolio->category == 'design' ? 'paint-brush' : 'code' }} me-1"></i>
                                                {{ ucfirst($portfolio->category) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $portfolio->is_active ? 'success' : 'secondary' }}">
                                                <i class="fas fa-{{ $portfolio->is_active ? 'check' : 'times' }} me-1"></i>
                                                {{ $portfolio->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">{{ $portfolio->sort_order }}</span>
                                        </td>
                                        <td>{{ $portfolio->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.portfolio.show', $portfolio) }}" 
                                                   class="btn btn-sm btn-outline-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" 
                                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" 
                                                      class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio item?')">
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

                    <!-- Grid View Toggle -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <small class="text-muted">Showing {{ $portfolios->count() }} portfolio items</small>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary active" id="tableViewBtn">
                                <i class="fas fa-table me-1"></i>Table View
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="gridViewBtn">
                                <i class="fas fa-th me-1"></i>Grid View
                            </button>
                        </div>
                    </div>

                    <!-- Grid View (Hidden by default) -->
                    <div id="gridView" style="display: none;" class="mt-4">
                        <div class="row">
                            @foreach($portfolios as $portfolio)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ $portfolio->image_url }}" class="card-img-top" alt="{{ $portfolio->title }}" 
                                             style="height: 200px; object-fit: cover;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $portfolio->title }}</h5>
                                            @if($portfolio->description)
                                                <p class="card-text text-muted small">{{ Str::limit($portfolio->description, 100) }}</p>
                                            @endif
                                            
                                            <div class="mb-2">
                                                <span class="badge bg-{{ $portfolio->category == 'design' ? 'info' : 'success' }} me-1">
                                                    <i class="fas fa-{{ $portfolio->category == 'design' ? 'paint-brush' : 'code' }} me-1"></i>
                                                    {{ ucfirst($portfolio->category) }}
                                                </span>
                                                <span class="badge bg-{{ $portfolio->is_active ? 'success' : 'secondary' }}">
                                                    <i class="fas fa-{{ $portfolio->is_active ? 'check' : 'times' }} me-1"></i>
                                                    {{ $portfolio->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </div>

                                            <div class="mt-auto">
                                                <div class="btn-group w-100" role="group">
                                                    <a href="{{ route('admin.portfolio.show', $portfolio) }}" 
                                                       class="btn btn-outline-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.portfolio.edit', $portfolio) }}" 
                                                       class="btn btn-outline-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" 
                                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio item?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No Portfolio Items Found</h4>
                        <p class="text-muted">Get started by adding your first portfolio item.</p>
                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add Portfolio Item
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableViewBtn = document.getElementById('tableViewBtn');
    const gridViewBtn = document.getElementById('gridViewBtn');
    const tableView = document.querySelector('.table-responsive');
    const gridView = document.getElementById('gridView');

    tableViewBtn.addEventListener('click', function() {
        tableView.style.display = 'block';
        gridView.style.display = 'none';
        tableViewBtn.classList.add('active');
        gridViewBtn.classList.remove('active');
    });

    gridViewBtn.addEventListener('click', function() {
        tableView.style.display = 'none';
        gridView.style.display = 'block';
        gridViewBtn.classList.add('active');
        tableViewBtn.classList.remove('active');
    });
});
</script>
@endsection

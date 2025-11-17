<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HoopsCloth') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-card {
            transition: transform 0.3s;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .category-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .category-detail {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 8px 15px;
            font-size: 0.9rem;
            display: inline-block;
            margin-right: 5px;
        }

        .empty-categories {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            font-style: italic;
        }

        .category-icon {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="min-h-screen bg-gray-100">
        <x-admin-navigation />
    </div>
    <div class="container py-3">

        <h1 class="text-center mb-4">Category List</h1>

        <!-- Categories Display -->
        <div class="tab-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>
                    All Categories
                </h4>
                <a href="{{ route('category.create.view') }}" class="btn btn-success btn-sm">
                    Create New
                </a>
            </div>

            @if ($categories->isEmpty())
                <div class="empty-categories">No categories available</div>
            @else
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4 mb-4">
                            <div class="card category-card h-100">
                                <div class="card-body d-flex flex-column text-center">
                                    <!-- Category Icon/Placeholder -->
                                    <div class="category-icon">
                                        ⭐
                                    </div>
                                    
                                    <h5 class="card-title category-name">{{ $category->category_name }}</h5>

                                    <!-- Category Info -->
                                    <div class="mb-3">
                                        <span class="category-detail">Category ID: {{ $category->id }}</span>
                                    </div>

                                    <!-- Product Count (if you have relationship) -->
                                    @if (isset($category->products_count))
                                        <div class="mb-3">
                                            <span class="category-detail text-info">
                                                <strong>Products:</strong> {{ $category->products_count }}
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Created Date -->
                                    <div class="mb-3">
                                        <small class="text-muted">
                                            Created: {{ $category->created_at->format('M d, Y') }}
                                        </small>
                                    </div>

                                    <div class="mt-auto">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('category.update.view', $category->id) }}"
                                                class="btn btn-dark me-md-2">
                                                Update
                                            </a>
                                            <form action="{{ route('delete.category', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>

</html>
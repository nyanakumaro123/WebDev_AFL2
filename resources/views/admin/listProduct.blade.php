<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HoopsCloth') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 200px;
            object-fit: contain;
            width: 100%;
        }

        .product-detail {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.85rem;
            display: inline-block;
            margin-right: 5px;
        }

        .product-price {
            font-weight: bold;
            color: #dc3545;
            font-size: 1.2rem;
        }

        .empty-category {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>

<body class="bg-light">
    <div class="min-h-screen bg-gray-100">
        <x-admin-navigation />
    </div>
    <div class="container py-3">
        <!-- Use the admin navigation component -->

        <h1 class="text-center mb-4">Product List</h1>

        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('product.list.view') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for products..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Display -->
        <div class="tab-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>All Products</h4>
                <a href="{{ route('product.create.view') }}" class="btn btn-success btn-sm">
                    Create New
                </a>
            </div>

            @if ($products->isEmpty())
                <div class="empty-category">No products found.</div>
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card product-card h-100">
                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                    class="card-img-top product-image" alt="{{ $product->product_name }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <div class="mb-2">
                                        <span class="product-detail">Size: {{ $product->product_size }}</span>
                                        <span class="product-detail">Color: {{ $product->product_color }}</span>
                                    </div>
                                    <div class="product-price mb-2">IDR {{ number_format($product->product_price, 2) }}
                                    </div>
                                    <p class="card-text text-muted">In Stock: {{ $product->quantity }}</p>

                                    <!-- Brand and Category Info -->
                                    <div class="mb-2">
                                        <small class="text-muted">
                                            <strong>Brand:</strong> {{ $product->brand->brand_name ?? 'N/A' }} |
                                            <strong>Category:</strong> {{ $product->category->category_name ?? 'N/A' }}
                                        </small>
                                    </div>

                                    <div class="mt-auto">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('product.update.view', $product->id) }}"class="btn btn-primary me-md-2">
                                                Update
                                            </a>
                                            <form action="{{ route('delete.product', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
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
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>

</body>

</html>

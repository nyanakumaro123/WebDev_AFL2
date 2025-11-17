<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HoopsCloth') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .brand-card {
            transition: transform 0.3s;
        }

        .brand-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .brand-image {
            height: 200px;
            object-fit: contain;
            width: 100%;
        }

        .brand-detail {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.85rem;
            display: inline-block;
            margin-right: 5px;
        }

        .brand-established {
            font-weight: bold;
            color: #28a745;
            font-size: 1rem;
        }

        .empty-brands {
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

        <h1 class="text-center mb-4">Brand List</h1>

        <!-- Brands Display -->
        <div class="tab-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>
                    All Brands
                </h4>
                <a href="{{ route('brand.create.view') }}" class="btn btn-success btn-sm">
                    Create New
                </a>
            </div>

            @if ($brands->isEmpty())
                <div class="empty-brands">No brands available</div>
            @else
                <div class="row">
                    @foreach ($brands as $brand)
                        <div class="col-md-4 mb-4">
                            <div class="card brand-card h-100">
                                <img src="{{ asset('storage/' . $brand->brand_image) }}"
                                    class="card-img-top brand-image" alt="{{ $brand->brand_name }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $brand->brand_name }}</h5>

                                    <!-- Brand Info -->
                                    <div class="mb-2">
                                        <span class="brand-detail">Established:
                                            @if (\Carbon\Carbon::hasFormat($brand->brand_establishment_date, 'Y-m-d'))
                                                {{ \Carbon\Carbon::parse($brand->brand_establishment_date)->format('M d, Y') }}
                                            @else
                                                {{ $brand->brand_establishment_date }} <!-- Fallback to raw value -->
                                            @endif
                                        </span>
                                        <span class="brand-detail">Country:
                                            {{ $brand->brand_manufacturing_country }}</span>
                                    </div>

                                    <!-- Product Count (if you have relationship) -->
                                    @if (isset($brand->products_count))
                                        <div class="mb-2">
                                            <small class="text-info">
                                                <strong>Products:</strong> {{ $brand->products_count }}
                                            </small>
                                        </div>
                                    @endif

                                    <div class="mt-auto">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('brand.update.view', $brand->id) }}"
                                                class="btn btn-primary me-md-2">
                                                Update
                                            </a>
                                            <form action="{{ route('delete.brand', $brand->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this brand?')">
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

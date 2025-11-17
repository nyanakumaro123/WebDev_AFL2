<x-app-layout>
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
            padding: 1rem;
        }

        .brand-detail {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.85rem;
            display: inline-block;
            margin-right: 5px;
        }

        .empty-brands {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            font-style: italic;
        }
    </style>
    <div class="container py-5">
        <h1 class="text-center mb-5">Our Brands</h1>

        @if ($brands->isEmpty())
            <div class="empty-brands">No brands available at the moment.</div>
        @else
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-md-4 mb-4">
                        <div class="card brand-card h-100">
                            <img src="{{ asset('storage/' . $brand->brand_image) }}"
                                class="card-img-top brand-image" alt="{{ $brand->brand_name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center">{{ $brand->brand_name }}</h5>
                                <div class="mt-auto text-center">
                                    <span class="brand-detail">Established:
                                        {{ \Carbon\Carbon::parse($brand->brand_establishment_date)->format('M d, Y') }}
                                    </span>
                                    <span class="brand-detail">Country: {{ $brand->brand_manufacturing_country }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
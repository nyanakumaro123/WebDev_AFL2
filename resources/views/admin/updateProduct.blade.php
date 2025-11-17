<x-admin-app-layout>
    <style>
        .product-image-preview {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-dark fw-bold mb-0 mx-auto">Update Product</h2>
                </div>

                <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('update.product', $products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Product Name</label>
                                <div class="input-group">
                                    <input type="text" name="product_name" value="{{ $products->product_name }}"
                                        class="form-control form-control-lg border-end-0"
                                        placeholder="Enter product name">
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="size" class="form-label fw-semibold text-dark">Product Size</label>
                                    <div class="input-group">
                                        <input type="text" name="product_size" value="{{ $products->product_size }}"
                                            class="form-control" placeholder="e.g., M, L, XL">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="color" class="form-label fw-semibold text-dark">Product Color</label>
                                    <div class="input-group">
                                        <input type="text" name="product_color" value="{{ $products->product_color }}"
                                            class="form-control" placeholder="Enter color">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="price" class="form-label fw-semibold text-dark">Product Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">IDR</span>
                                        <input type="number" name="product_price" value="{{ $products->product_price }}"
                                            class="form-control" placeholder="0.00">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="quantity" class="form-label fw-semibold text-dark">Quantity</label>
                                    <div class="input-group">
                                        <input type="number" name="quantity" value="{{ $products->quantity }}"
                                            class="form-control" placeholder="Enter quantity">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold text-dark">Product Image</label>
                                <div class="mt-2">
                                         <img src="{{ asset('storage/'.$products->product_image) }}" alt="{{ $products->product_name }}" class="product-image-preview">
                                    </div>
                                <div class="input-group">
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                                <div class="form-text">Select a new product image (JPG, PNG, etc.)</div>
                                {{-- @if ($products->product_image)
                                    
                                @endif --}}
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="brand_id" class="form-label fw-semibold text-dark">Brand Name</label>
                                    <select name="brand_id" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand['id'] }}">
                                                {{ $brand['brand_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="category_id" class="form-label fw-semibold text-dark">Category Name</label>
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">
                                                {{ $category['category_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg fw-semibold py-2">
                                    Update Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

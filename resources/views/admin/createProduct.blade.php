<x-admin-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-dark fw-bold mb-0 mx-auto">Create Product</h2>
                </div>

                <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Product Name</label>
                                <div class="input-group">
                                    <input type="text" name="product_name"
                                        class="form-control form-control-lg border-end-0" maxlength="50"
                                        placeholder="Enter product name">
                                </div>
                                @if ($errors->has('product_name'))
                                    <div class="d-flex align-items-center mt-2">
                                        <p class="text-danger mb-0 small">{{ $errors->first('product_name') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="size" class="form-label fw-semibold text-dark">Product Size</label>
                                    <div class="input-group">
                                        <input type="text" name="product_size" class="form-control" maxlength="4"
                                            placeholder="e.g., M, L, XL">
                                    </div>
                                    @if ($errors->has('product_size'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('product_size') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="color" class="form-label fw-semibold text-dark">Product Color</label>
                                    <div class="input-group">
                                        <input type="text" name="product_color" class="form-control" maxlength="50"
                                            placeholder="Enter color">
                                    </div>
                                    @if ($errors->has('product_color'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('product_color') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="price" class="form-label fw-semibold text-dark">Product Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">IDR</span>
                                        <input type="number" name="product_price" class="form-control" placeholder="0.00">
                                    </div>
                                    @if ($errors->has('product_price'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('product_price') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="quantity" class="form-label fw-semibold text-dark">Quantity</label>
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="Enter quantity">
                                    </div>
                                    @if ($errors->has('quantity'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('quantity') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold text-dark">Product Image</label>
                                <div class="input-group">
                                    <input type="file" name="product_image" class="form-control" maxlength="250">
                                </div>
                                <div class="form-text">Select a product image (JPG, PNG, etc.)</div>
                                @if ($errors->has('product_image'))
                                    <div class="d-flex align-items-center mt-2">
                                        <p class="text-danger mb-0 small">{{ $errors->first('product_image') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="brand_id" class="form-label fw-semibold text-dark">Brand Name</label>
                                    <select name="brand_id" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand['id'] }}">{{ $brand['brand_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="category_id" class="form-label fw-semibold text-dark">Category Name </label>
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['category_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg fw-semibold py-2">
                                    Create Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

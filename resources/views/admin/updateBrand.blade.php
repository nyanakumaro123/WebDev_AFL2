<x-admin-app-layout>
    <style>
        .brand-image-preview {
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
                        <form action="{{ route('update.brand', $brands->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Brand Name</label>
                                <div class="input-group">
                                    <input type="text" name="brand_name" value="{{ $brands->brand_name }}"
                                        class="form-control form-control-lg border-end-0"
                                        placeholder="Enter brand name">
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="size" class="form-label fw-semibold text-dark">Brand Establishment Date</label>
                                    <div class="input-group">
                                        <input type="text" name="brand_establishment_date" value="{{ $brands->brand_establishment_date }}"
                                            class="form-control" placeholder="20 2 1996">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="color" class="form-label fw-semibold text-dark">Brand Manufacturing Country</label>
                                    <div class="input-group">
                                        <input type="text" name="brand_manufacturing_country" value="{{ $brands->brand_manufacturing_country }}"
                                            class="form-control" placeholder="Enter brand Manufacturing Country">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold text-dark">Brand Image</label>
                                <div class="mt-2">
                                         <img src="{{ asset('storage/'.$brands->brand_image) }}" alt="{{ $brands->brand_name }}" class="brand-image-preview">
                                    </div>
                                <div class="input-group">
                                    <input type="file" name="brand_image" class="form-control">
                                </div>
                                <div class="form-text">Select a new brand image (JPG, PNG, etc.)</div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg fw-semibold py-2">
                                    Update Brand
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

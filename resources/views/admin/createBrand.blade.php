<x-admin-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-dark fw-bold mb-0 mx-auto">Create Brand</h2>
                </div>

                <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('create.brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Brand Name</label>
                                <div class="input-group">
                                    <input type="text" name="brand_name"
                                        class="form-control form-control-lg border-end-0"
                                        placeholder="Enter brand name">
                                </div>
                                @if ($errors->has('brand_name'))
                                    <div class="d-flex align-items-center mt-2">
                                        <p class="text-danger mb-0 small">{{ $errors->first('brand_name') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="establishment_date" class="form-label fw-semibold text-dark">Brand Establishment Date</label>
                                    <div class="input-group">
                                        <input type="date" name="brand_establishment_date"
                                            class="form-control">
                                    </div>
                                    @if ($errors->has('brand_establishment_date'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('brand_establishment_date') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="manufacturing_country" class="form-label fw-semibold text-dark">Brand Manufacturing Country</label>
                                    <div class="input-group">
                                        <input type="text" name="brand_manufacturing_country"
                                            class="form-control" placeholder="Enter brand manufacturing country">
                                    </div>
                                    @if ($errors->has('brand_manufacturing_country'))
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="text-danger mb-0 small">{{ $errors->first('brand_manufacturing_country') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold text-dark">Brand Image</label>
                                <div class="input-group">
                                    <input type="file" name="brand_image" class="form-control">
                                </div>
                                <div class="form-text">Select a brand image (JPG, PNG, etc.)</div>
                                @if ($errors->has('brand_image'))
                                    <div class="d-flex align-items-center mt-2">
                                        <p class="text-danger mb-0 small">{{ $errors->first('brand_image') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg fw-semibold py-2">
                                    Create Brand
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
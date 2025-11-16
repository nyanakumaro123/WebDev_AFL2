<x-admin-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-dark fw-bold mb-0 mx-auto">Update Category</h2>
                </div>

                <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('update.category', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Category Name</label>
                                <div class="input-group">
                                    <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}"
                                        class="form-control form-control-lg border-end-0"
                                        placeholder="Enter category name">
                                </div>
                                @if ($errors->has('category_name'))
                                    <div class="d-flex align-items-center mt-2">
                                        <p class="text-danger mb-0 small">{{ $errors->first('category_name') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg fw-semibold py-2">
                                    Update Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
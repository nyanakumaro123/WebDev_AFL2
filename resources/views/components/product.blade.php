@props(['product'])

<div class="col-lg-4 mb-4">
    <div class="card h-100 shadow-sm border-0 position-relative">
        
        <div class="ratio ratio-1x1 overflow-hidden">
            <img src="{{ asset($product->product_image) }}" 
                 class="w-100 h-100 object-fit-cover" 
                 alt="{{ $product->product_name }}" 
                 id="product-image-{{ $product->id }}">
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">{{ $product->product_name }}</h5>
            <p class="card-text text-muted">{{ $product->brand->brand_name }}</p>
            <h6 class="card-subtitle mb-2 fw-bold">IDR {{ number_format($product->product_price, 0, ',', '.') }}</h6>
            
            <!-- Size Selection -->
            <div class="d-flex justify-content-start align-items-center mb-3">
                <span class="me-2">Size:</span>
                <div class="btn-group" role="group" aria-label="Size selection">
                    <input type="radio" class="btn-check" name="size-{{ $product->id }}" id="size-s-{{ $product->id }}" autocomplete="off" checked>
                    <label class="btn btn-outline-dark btn-sm" for="size-s-{{ $product->id }}">S</label>

                    <input type="radio" class="btn-check" name="size-{{ $product->id }}" id="size-m-{{ $product->id }}" autocomplete="off">
                    <label class="btn btn-outline-dark btn-sm" for="size-m-{{ $product->id }}">M</label>

                    <input type="radio" class="btn-check" name="size-{{ $product->id }}" id="size-l-{{ $product->id }}" autocomplete="off">
                    <label class="btn btn-outline-dark btn-sm" for="size-l-{{ $product->id }}">L</label>

                    <input type="radio" class="btn-check" name="size-{{ $product->id }}" id="size-xl-{{ $product->id }}" autocomplete="off">
                    <label class="btn btn-outline-dark btn-sm" for="size-xl-{{ $product->id }}">XL</label>
                </div>
            </div>

            <!-- Color Selection -->
            <div class="d-flex justify-content-start align-items-center mb-3">
                <span class="me-2">Color:</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="color-{{ $product->id }}" id="color-black-{{ $product->id }}" value="Black" checked onchange="changeColor({{ $product->id }}, 'Black')">
                    <label class="form-check-label" for="color-black-{{ $product->id }}">Black</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="color-{{ $product->id }}" id="color-white-{{ $product->id }}" value="White" onchange="changeColor({{ $product->id }}, 'White')">
                    <label class="form-check-label" for="color-white-{{ $product->id }}">White</label>
                </div>
            </div>

            <button type="button" class="btn btn-dark w-100 mt-auto">
                <i class="bi bi-cart-plus"></i> Add to Cart
            </button>
        </div>
    </div>
</div>

<script>
    function changeColor(productId, color) {
        const image = document.getElementById(`product-image-${productId}`);
        const currentSrc = image.src; 
        
        let newSrc;
        if (color === 'Black') {
            newSrc = currentSrc.replace('_White.png', '_Black.png');
        } else {
            newSrc = currentSrc.replace('_Black.png', '_White.png');
        }
        
        image.src = newSrc;
    }
</script>
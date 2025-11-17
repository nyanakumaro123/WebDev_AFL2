<x-app-layout>
    <section id="about" class="text-center bg-light py-5">
        <div class="container">
            <h1 class="display-4">ELEVATE YOUR GAME</h1>
            <p class="lead">
                A Clothing store designed for players. so you can have High-performance basketball plays.
            </p>
        </div>
    </section>

    <section id="products" class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Product List</h2>
                <p class="text-muted">Our curated collection of performance wear.</p>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mx-auto">
                    <form action="{{ route('index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search for products..." value="{{ request('search') }}">
                            <button class="btn btn-dark" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($allproducts as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 product-card">
                            <div class="card-img-container" style="height: 450px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                    class="card-img-top h-100 object-fit-cover" alt="{{ $product->product_name }}"
                                    style="object-fit: contain; background-color: #f8f9fa;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"
                                    style="min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $product->product_name }}
                                </h5>
                                <p class="card-text text-muted mb-1">{{ $product->brand->brand_name }}</p>
                                <p class="card-text fw-bold text-danger mb-0">Rp
                                    {{ number_format($product->product_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $allproducts->links() }}
            </div>
        </div>
    </section>


    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Get In Touch</h2>
                <p class="text-muted">Here's how you can reach us.</p>
            </div>

            <div class="row text-center">
                <div class="col-md-4">
                    <h4>Our Store</h4>
                    <p>Universitas Ciputra<br>Surabaya, Jawa Timur </p>
                </div>
                <div class="col-md-4">
                    <h4>Phone & Email</h4>
                    <p>Phone: +62 81332227372<br>Email: contact@hoopscloth.id</p>
                </div>
                <div class="col-md-4">
                    <h4>Business Hours</h4>
                    <p>Senin - Sabtu: 10:00 - 21:00<br>Minggu: Libur</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2025 HoopsCloth . Buuyy.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>

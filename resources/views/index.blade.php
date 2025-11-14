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

            <div class="row">
                @foreach ($allproducts as $product)
                    <x-product :product="$product" />
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $allproducts->links() }}
            </div>
        </div>
    </section>

    <section id="gallery" class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Gallery</h2>
                <p class="text-muted">In-game action. Street style.</p>
            </div>

            <div class="row g-4">
                
                    <img src="https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=2069" class="img-fluid rounded" alt="Gallery Image">
               
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
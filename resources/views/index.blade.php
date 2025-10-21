<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HoopsElite Apparel - Simple</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">HoopsElite</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#about">About</a>
                <a class="nav-link" href="#products">Products</a>
                <a class="nav-link" href="#gallery">Gallery</a>
                <a class="nav-link" href="#contact">Contact</a>
            </div>
        </div>
    </nav>

    <section id="about" class="text-center bg-light py-5">
        <div class="container">
            <h1 class="display-4">ELEVATE YOUR GAME</h1>
            <p class="lead">
                Founded by players, for players. High-performance basketball apparel.
            </p>
        </div>
    </section>

    <section id="products" class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Product List</h2>
                <p class="text-muted">Our curated collection of performance wear.</p>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Brand</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allproducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_size }}</td>
                        <td>{{ $product->product_color }}</td>
                        
                        <td>{{ $product->brand->brand_name }}</td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section id="gallery" class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Gallery</h2>
                <p class="text-muted">In-game action. Street style.</p>
            </div>

            <div class="row g-4">
                {{-- <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1519861531473-92002a281736?q=80&w=2070" class="img-fluid rounded" alt="Gallery Image">
                </div>
                <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1520024741697-b86fb3defb1e?q=80&w=2070" class="img-fluid rounded" alt="Gallery Image">
                </div> --}}
                <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=2069" class="img-fluid rounded" alt="Gallery Image">
                </div>
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
                    <p>Jalan Cendrawasih No. 23<br>Surabaya, Jawa Timur 60234</p>
                </div>
                <div class="col-md-4">
                    <h4>Phone & Email</h4>
                    <p>Phone: +62 812 3456 7890<br>Email: contact@hoopselite.id</p>
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
            <p class="mb-0">&copy; 2025 HoopsElite Apparel. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
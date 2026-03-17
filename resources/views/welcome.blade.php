<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TechStore - Tu Tienda de Tecnología</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f8f9fa;
            }
            .hero {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 100px 0;
                text-align: center;
            }
            .hero h1 {
                font-size: 3rem;
                margin-bottom: 20px;
            }
            .hero p {
                font-size: 1.2rem;
                margin-bottom: 30px;
            }
            .btn {
                display: inline-block;
                padding: 12px 30px;
                background-color: #28a745;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .btn:hover {
                background-color: #218838;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }
            .section {
                padding: 60px 0;
            }
            .section h2 {
                text-align: center;
                margin-bottom: 40px;
                color: #333;
            }
            .features {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
            }
            .feature {
                text-align: center;
                width: 30%;
                margin-bottom: 30px;
            }
            .feature i {
                font-size: 3rem;
                color: #667eea;
                margin-bottom: 20px;
            }
            .products {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }
            .product-card {
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                overflow: hidden;
                transition: transform 0.3s;
            }
            .product-card:hover {
                transform: translateY(-5px);
            }
            .product-image {
                height: 200px;
                background: #f0f0f0;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 4rem;
                color: #ccc;
            }
            .product-body {
                padding: 20px;
            }
            .product-title {
                font-size: 1.2rem;
                font-weight: 600;
                margin-bottom: 10px;
            }
            .product-price {
                color: #28a745;
                font-weight: 700;
                font-size: 1.1rem;
            }
            .footer {
                background: #333;
                color: white;
                text-align: center;
                padding: 20px 0;
            }
            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2rem;
                }
                .features {
                    flex-direction: column;
                    align-items: center;
                }
                .feature {
                    width: 80%;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header style="background: white; padding: 20px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
                <h2 style="margin: 0; color: #667eea;">TechStore</h2>
                <nav>
                    <a href="{{ route('productos.index') }}" style="margin: 0 15px; text-decoration: none; color: #333;">Productos</a>
                    <a href="#" style="margin: 0 15px; text-decoration: none; color: #333;">Categorías</a>
                    <a href="#" style="margin: 0 15px; text-decoration: none; color: #333;">Contacto</a>
                    @auth
                        <a href="{{ route('cart.index') }}" style="margin: 0 15px; text-decoration: none; color: #333;"><i class="fas fa-shopping-cart"></i> Carrito</a>
                        <a href="{{ url('/home') }}" style="margin: 0 15px; text-decoration: none; color: #333;">Panel</a>
                    @else
                        <a href="{{ route('login') }}" style="margin: 0 15px; text-decoration: none; color: #333;">Iniciar Sesión</a>
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>Bienvenido a TechStore</h1>
                <p>Descubre la mejor selección de computadoras, laptops y accesorios tecnológicos al mejor precio</p>
                <a href="{{ route('productos.index') }}" class="btn">Ver Productos</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="section">
            <div class="container">
                <h2>¿Por qué elegirnos?</h2>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-shipping-fast"></i>
                        <h3>Envío Rápido</h3>
                        <p>Entrega en 24-48 horas en toda la ciudad</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Garantía</h3>
                        <p>Garantía oficial en todos nuestros productos</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-headset"></i>
                        <h3>Soporte 24/7</h3>
                        <p>Atención al cliente disponible todo el día</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="section" style="background: white;">
            <div class="container">
                <h2>Productos Destacados</h2>
                <div class="products">
                    @php
                        $featuredProducts = \App\Models\Product::orderBy('created_at', 'desc')->take(6)->get();
                    @endphp
                    @forelse($featuredProducts as $product)
                        <div class="product-card">
                            <div class="product-image">
                                @if($product->imagen)
                                    <img src="/storage/{{ $product->imagen }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-laptop"></i>
                                @endif
                            </div>
                            <div class="product-body">
                                <div class="product-title">{{ $product->name }}</div>
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                <a href="{{ route('productos.show', $product->id) }}" class="btn" style="margin-top: 10px; font-size: 0.9rem; padding: 8px 20px;">Ver Detalles</a>
                            </div>
                        </div>
                    @empty
                        <p>No hay productos disponibles aún.</p>
                    @endforelse
                </div>
                <div style="text-align: center; margin-top: 40px;">
                    <a href="{{ route('productos.index') }}" class="btn">Ver Todos los Productos</a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p>&copy; 2026 TechStore. Todos los derechos reservados.</p>
            </div>
        </footer>
    </body>
</html>

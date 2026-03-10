@extends('layout.app')

@section('content')
<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <h1>Bienvenido a TechStore</h1>
        <p>Descubre la mejor selección de computadoras y accesorios tecnológicos</p>
    </div>
</div>

<!-- Products Section -->
<div class="container">
    <div class="products-header">
        <h2><i class="fas fa-laptop"></i> Nuestros Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Nuevo Producto
        </a>
    </div>

    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="product-card">
                    <!-- Product Image -->
                    <div class="product-image">
                        @if($product->imagen)
                            <img src="/storage/{{ $product->imagen }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            @if(strpos($product->name, 'Laptop') !== false || strpos($product->name, 'laptop') !== false)
                                <i class="fas fa-laptop"></i>
                            @elseif(strpos($product->name, 'Desktop') !== false || strpos($product->name, 'computadora') !== false)
                                <i class="fas fa-desktop"></i>
                            @elseif(strpos($product->name, 'Monitor') !== false || strpos($product->name, 'monitor') !== false)
                                <i class="fas fa-tv"></i>
                            @elseif(strpos($product->name, 'Keyboard') !== false || strpos($product->name, 'teclado') !== false)
                                <i class="fas fa-keyboard"></i>
                            @elseif(strpos($product->name, 'Mouse') !== false || strpos($product->name, 'ratón') !== false)
                                <i class="fas fa-mouse"></i>
                            @else
                                <i class="fas fa-microchip"></i>
                            @endif
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="product-body">
                        <div class="product-category">
                            {{ $product->category->name ?? 'Sin categoría' }}
                        </div>
                        <div class="product-name">
                            {{ $product->name }}
                        </div>
                        <div class="product-description">
                            {{ $product->description ?? 'Descripción no disponible' }}
                        </div>
                        <div class="product-price">
                            ${{ number_format($product->price, 2) }}
                        </div>

                        <!-- Actions -->
                        <div class="product-footer">
                            <a href="{{ route('productos.show', $product->id) }}" class="btn-custom btn-view">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                            <button class="btn-custom btn-cart">
                                <i class="fas fa-shopping-cart"></i> Carrito
                            </button>
                        </div>

                        <!-- Admin Actions (Edit/Delete) -->
                        <div class="mt-3" style="display: flex; gap: 10px;">
                            <a href="{{ route('productos.edit', $product->id) }}" class="btn btn-sm btn-warning" style="flex: 1;">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('productos.destroy', $product->id) }}" method="POST" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('¿Estás seguro?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center py-5">
            <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 20px; display: block;"></i>
            <h4>No hay productos disponibles</h4>
            <p>¡Comienza agregando tu primer producto!</p>
            <a href="{{ route('productos.create') }}" class="btn btn-primary mt-3">
                <i class="fas fa-plus"></i> Crear Primer Producto
            </a>
        </div>
    @endif
</div>
@endsection

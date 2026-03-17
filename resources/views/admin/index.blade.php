@extends('layouts.admin')

@section('content')
<div class="row">
    <!-- Estadísticas -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <i class="fas fa-box fa-2x mb-2"></i>
                <h3>{{ \App\Models\Product::count() }}</h3>
                <p>Productos Totales</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h3>{{ \App\Models\User::count() }}</h3>
                <p>Usuarios Registrados</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                <h3>{{ \App\Models\cartitems::where('user_id', auth()->id())->sum('quantity') }}</h3>
                <p>Items en tu Carrito</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                <h3>${{ number_format(\App\Models\Product::sum('price'), 2) }}</h3>
                <p>Valor Total de Inventario</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Acciones Rápidas -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-bolt"></i> Acciones Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('productos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Agregar Nuevo Producto
                    </a>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list"></i> Ver Todos los Productos
                    </a>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-success">
                        <i class="fas fa-shopping-cart"></i> Ver Mi Carrito
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos Recientes -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-clock"></i> Productos Recientes</h5>
            </div>
            <div class="card-body">
                @php
                    $recentProducts = \App\Models\Product::orderBy('created_at', 'desc')->take(5)->get();
                @endphp
                @forelse($recentProducts as $product)
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            @if($product->imagen)
                                <img src="/storage/{{ $product->imagen }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <i class="fas fa-box fa-2x text-muted"></i>
                            @endif
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $product->name }}</h6>
                            <small class="text-muted">${{ number_format($product->price, 2) }}</small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No hay productos recientes.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Gráfico Placeholder -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-line"></i> Estadísticas de Ventas</h5>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-chart-bar fa-4x text-muted mb-3"></i>
                <p class="text-muted">Gráfico de estadísticas próximamente...</p>
            </div>
        </div>
    </div>
</div>
@endsection
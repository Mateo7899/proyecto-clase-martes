@extends('layout.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4"><i class="fas fa-shopping-cart"></i> Mi Carrito</h1>

    @if($cartItems->count() > 0)
        <div class="row">
            <div class="col-lg-8">
                @foreach($cartItems as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    @if($item->product->imagen)
                                        <img src="/storage/{{ $item->product->imagen }}" alt="{{ $item->product->name }}" class="img-fluid rounded">
                                    @else
                                        <i class="fas fa-laptop fa-3x text-muted"></i>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $item->product->name }}</h5>
                                    <p class="text-muted">{{ $item->product->category->name ?? 'Sin categoría' }}</p>
                                </div>
                                <div class="col-md-2">
                                    <span class="h5 text-primary">${{ number_format($item->product->price, 2) }}</span>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control d-inline-block" style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-1">Actualizar</button>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este producto del carrito?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Resumen del Pedido</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>${{ number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Envío:</span>
                            <span>Gratis</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total:</strong>
                            <strong>${{ number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }}</strong>
                        </div>
                        <button class="btn btn-success w-100">Proceder al Pago</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-5x text-muted mb-3"></i>
            <h3>Tu carrito está vacío</h3>
            <p class="text-muted">Agrega algunos productos para comenzar.</p>
            <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
        </div>
    @endif
</div>
@endsection
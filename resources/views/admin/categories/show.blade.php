@extends('layouts.admin')

@section('title', 'Ver Categoría - Admin Panel')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-tag"></i> Detalles de Categoría</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>ID:</strong></div>
                    <div class="col-sm-9">{{ $category->id }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Nombre:</strong></div>
                    <div class="col-sm-9">{{ $category->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Descripción:</strong></div>
                    <div class="col-sm-9">{{ $category->description ?? 'Sin descripción' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Productos:</strong></div>
                    <div class="col-sm-9">{{ $category->products()->count() }} productos</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Creado:</strong></div>
                    <div class="col-sm-9">{{ $category->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Actualizado:</strong></div>
                    <div class="col-sm-9">{{ $category->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Acciones</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-list"></i> Ver Todas
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($category->products()->count() > 0)
        <div class="card mt-3">
            <div class="card-header">
                <h5>Productos en esta Categoría</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach($category->products()->take(5)->get() as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge bg-primary rounded-pill">${{ number_format($product->price, 2) }}</span>
                        </li>
                    @endforeach
                    @if($category->products()->count() > 5)
                        <li class="list-group-item text-center">
                            <small class="text-muted">Y {{ $category->products()->count() - 5 }} más...</small>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
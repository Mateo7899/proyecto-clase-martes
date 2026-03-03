@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                <h2 style="margin-bottom: 30px; color: #333;">
                    <i class="fas fa-edit" style="color: #667eea; margin-right: 10px;"></i>Editar Producto
                </h2>

                <form action="{{ route('productos.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" style="font-weight: bold; color: #333; margin-bottom: 8px; display: block;">Nombre del Producto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required style="padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>

                    <div class="mb-3">
                        <label for="description" style="font-weight: bold; color: #333; margin-bottom: 8px; display: block;">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="4" style="padding: 10px; border: 1px solid #ddd; border-radius: 8px;">{{ $product->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" style="font-weight: bold; color: #333; margin-bottom: 8px; display: block;">Precio</label>
                            <div style="display: flex; align-items: center;">
                                <span style="font-weight: bold; margin-right: 5px; color: #667eea;">$</span>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required style="padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" style="font-weight: bold; color: #333; margin-bottom: 8px; display: block;">Categoría</label>
                            <select class="form-control" id="category_id" name="category_id" required style="padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                                @foreach(\App\Models\category::all() as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 30px; display: flex; gap: 15px;">
                        <button type="submit" style="flex: 1; padding: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px;">
                            <i class="fas fa-save"></i> Actualizar Producto
                        </button>
                        <a href="{{ route('productos.index') }}" style="flex: 1; padding: 12px; background: #f0f0f0; color: #667eea; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>

                    <!-- Delete Button -->
                    <form action="{{ route('productos.destroy', $product->id) }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-100" style="padding: 12px; background: #dc3545; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                            <i class="fas fa-trash"></i> Eliminar Producto
                        </button>
                    </form>
                </form>
            </div>
        </div>
    </div>

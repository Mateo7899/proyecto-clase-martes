@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Product Image -->
        <div class="col-md-6">
            @if($product->imagen)
                <img src="/storage/{{ $product->imagen }}" alt="{{ $product->name }}" style="width: 100%; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
            @else
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; padding: 40px; display: flex; align-items: center; justify-content: center; height: 400px; color: white;">
                    @if(strpos($product->name, 'Laptop') !== false || strpos($product->name, 'laptop') !== false)
                        <i class="fas fa-laptop" style="font-size: 150px;"></i>
                    @elseif(strpos($product->name, 'Desktop') !== false || strpos($product->name, 'computadora') !== false)
                        <i class="fas fa-desktop" style="font-size: 150px;"></i>
                    @elseif(strpos($product->name, 'Monitor') !== false || strpos($product->name, 'monitor') !== false)
                        <i class="fas fa-tv" style="font-size: 150px;"></i>
                    @elseif(strpos($product->name, 'Keyboard') !== false || strpos($product->name, 'teclado') !== false)
                        <i class="fas fa-keyboard" style="font-size: 150px;"></i>
                    @elseif(strpos($product->name, 'Mouse') !== false || strpos($product->name, 'ratón') !== false)
                        <i class="fas fa-mouse" style="font-size: 150px;"></i>
                    @else
                        <i class="fas fa-microchip" style="font-size: 150px;"></i>
                    @endif
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <span style="color: #667eea; font-weight: bold; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">
                {{ $product->category->name ?? 'Sin categoría' }}
            </span>
            <h1 style="margin-top: 10px; margin-bottom: 20px;">{{ $product->name }}</h1>

            <div style="font-size: 36px; font-weight: bold; color: #667eea; margin-bottom: 20px;">
                ${{ number_format($product->price, 2) }}
            </div>

            <h5 style="margin-top: 30px; margin-bottom: 15px; color: #333;">Descripción</h5>
            <p style="color: #666; line-height: 1.6;">{{ $product->description ?? 'Descripción no disponible' }}</p>

            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 30px;">
                <div style="margin-bottom: 15px;">
                    <strong style="color: #333;">Información del Producto:</strong>
                </div>
                <div style="margin-bottom: 10px;">
                    <span style="color: #666;">Categoría:</span> <strong>{{ $product->category->name ?? 'N/A' }}</strong>
                </div>
                <div style="margin-bottom: 10px;">
                    <span style="color: #666;">Creado:</span> <strong>{{ $product->created_at->format('d/m/Y H:i') }}</strong>
                </div>
                <div>
                    <span style="color: #666;">Última actualización:</span> <strong>{{ $product->updated_at->format('d/m/Y H:i') }}</strong>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="margin-top: 30px; display: flex; gap: 15px;">
                <button style="flex: 1; padding: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px;">
                    <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                </button>
                <a href="{{ route('productos.edit', $product->id) }}" style="flex: 1; padding: 15px; background: #f0f0f0; color: #667eea; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>

            <div style="margin-top: 15px;">
                <a href="{{ route('productos.index') }}" style="color: #667eea; text-decoration: none; font-weight: bold;">
                    <i class="fas fa-arrow-left"></i> Volver a la Tienda
                </a>
            </div>
        </div>

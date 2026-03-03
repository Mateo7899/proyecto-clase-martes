<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('productos.index', compact('products'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('productos.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('productos.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('productos.index');
    }
}

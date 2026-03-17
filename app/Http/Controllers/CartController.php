<?php

namespace App\Http\Controllers;

use App\Models\cartitems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para agregar productos al carrito.');
        }

        $cartItem = cartitems::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            cartitems::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItems = cartitems::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function update(Request $request, $id)
    {
        $cartItem = cartitems::findOrFail($id);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cantidad actualizada.');
    }

    public function remove($id)
    {
        $cartItem = cartitems::findOrFail($id);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }
}
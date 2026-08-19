<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Product $product)
    {
        if ($product->status === 'sold') {
            return back()->with('error', 'Dieses Produkt wurde bereits verkauft.');
        }

        Order::create([
            'user_id' => 1,
            'product_id' => $product->id,
            'price' => $product->current_price,
            'status' => 'completed',
        ]);

        $product->update([
            'status' => 'sold',
        ]);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Produkt erfolgreich gekauft.');
    }
}
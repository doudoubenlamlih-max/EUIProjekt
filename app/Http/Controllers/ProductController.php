<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    $categories = Category::all();

    return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'current_price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

   Product::create([
    'user_id' => 1,
    'title' => $request->title,
    'description' => $request->description,
    'starting_price' => $request->current_price,
    'current_price' => $request->current_price,
    'category_id' => $request->category_id,
    'image' => $imagePath,
]);
    return redirect()
        ->route('products.index')
        ->with('success', 'Produkt wurde erfolgreich erstellt.');
}
    /**
     * Display the specified resource.
     */
  public function show(string $id)
{
    $product = Product::findOrFail($id);

    return view('products.show', compact('product'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $product = Product::findOrFail($id);

    // Zugehörige Gebote zuerst löschen
    $product->bids()->delete();

    // Produkt löschen
    $product->delete();

    return redirect()
        ->route('products.index')
        ->with('success', 'Produkt wurde erfolgreich gelöscht.');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('products.show-products', ['products' => $products, 'view' => 'show-products']);
    }
    
    public function create()
    {
        return view('products.create', ['view' => 'create-product']);
    }
    
    public function edit(Product $product)
    {
        return view('products.edit', compact('product', ['view' => 'edit-product']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.show-products')->with('success', 'Product created successfully.');
    }


    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.show-products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.show-products')->with('success', 'Product deleted successfully.');
    }
}

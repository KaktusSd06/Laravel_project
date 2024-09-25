<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sortField', 'id'); // Поле для сортування (за замовчуванням 'id')
        $sortDirection = $request->get('sortDirection', 'asc'); // Напрямок сортування (за замовчуванням 'asc')
    
        $products = Product::orderBy($sortField, $sortDirection)->get();
    
        return view('product.index', compact('products', 'sortField', 'sortDirection')); // Передаємо змінні сортування у вигляд
    }
    

    public function create()
    {
        return view('product.create'); // Повертаємо вьюшку для створення продукту
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product')); // Повертаємо вьюшку для редагування продукту
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sortField', 'id'); // Поле для сортування (за замовчуванням 'id')
        $sortDirection = $request->get('sortDirection', 'asc'); // Напрямок сортування (за замовчуванням 'asc')
    
        $purchases = Purchase::orderBy($sortField, $sortDirection)->get();
    
        return view('purchase.index', compact('purchases', 'sortField', 'sortDirection')); // Передаємо сортування у вигляд
    }
    

    public function create()
    {
        return view('purchase.create'); // Повертаємо вьюшку для створення нової покупки
    }

    public function store(Request $request)
    {
        $request->validate([
            'purchase_date' => 'required|date',
            'total_price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'nullable|exists:products,id',
            'training_session_id' => 'nullable|exists:training_sessions,id',
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchase.index')
                         ->with('success', 'Purchase created successfully!');
    }

    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchase.show', compact('purchase')); // Повертаємо вьюшку для показу покупки
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchase.edit', compact('purchase')); // Повертаємо вьюшку для редагування покупки
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);

        $request->validate([
            'purchase_date' => 'date',
            'total_price' => 'numeric|min:0',
            'user_id' => 'exists:users,id',
            'product_id' => 'nullable|exists:products,id',
            'training_session_id' => 'nullable|exists:training_sessions,id',
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchase.index')->with('success', 'Purchase updated successfully!');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchase.index')->with('success', 'Purchase deleted successfully!');
    }
}

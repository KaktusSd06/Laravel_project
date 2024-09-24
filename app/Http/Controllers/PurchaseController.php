<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return response()->json($purchases);
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

        $purchase = Purchase::create($request->all());

        return response()->json([
            'message' => 'Purchase created successfully!',
            'purchase' => $purchase,
        ], 201);
    }

    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return response()->json($purchase);
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

        return response()->json([
            'message' => 'Purchase updated successfully!',
            'purchase' => $purchase,
        ]);
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return response()->json([
            'message' => 'Purchase deleted successfully!',
        ]);
    }
}

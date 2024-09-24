<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return response()->json($memberships);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $membership = Membership::create($request->all());

        return response()->json([
            'message' => 'Membership created successfully!',
            'membership' => $membership,
        ], 201);
    }

    public function show($id)
    {
        $membership = Membership::findOrFail($id);
        return response()->json($membership);
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);

        $request->validate([
            'type' => 'string|max:255',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'price' => 'numeric|min:0',
            'user_id' => 'exists:users,id',
        ]);

        $membership->update($request->all());

        return response()->json([
            'message' => 'Membership updated successfully!',
            'membership' => $membership,
        ]);
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return response()->json([
            'message' => 'Membership deleted successfully!',
        ]);
    }
}

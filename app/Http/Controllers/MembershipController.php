<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));
    }

    public function create()
    {
        return view('membership.create'); // Повертаємо вьюшку для створення нового членства
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

        Membership::create($request->all());

        return redirect()->route('membership.index')
                         ->with('success', 'Membership created successfully!');
    }

    public function show($id)
    {
        $membership = Membership::findOrFail($id);
        return view('membership.show', compact('membership')); // Повертаємо вьюшку для показу членства
    }

    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('membership.edit', compact('membership')); // Повертаємо вьюшку для редагування членства
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

        return redirect()->route('membership.index')->with('success', 'Membership updated successfully!');
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('membership.index')->with('success', 'Membership deleted successfully!');
    }
}

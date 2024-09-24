<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return response()->json($trainers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $trainer = Trainer::create($request->all());

        return response()->json([
            'message' => 'Trainer created successfully!',
            'trainer' => $trainer,
        ], 201);
    }

    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return response()->json($trainer);
    }

    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);

        $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'specialization' => 'string|max:255',
        ]);

        $trainer->update($request->all());

        return response()->json([
            'message' => 'Trainer updated successfully!',
            'trainer' => $trainer,
        ]);
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return response()->json([
            'message' => 'Trainer deleted successfully!',
        ]);
    }
}
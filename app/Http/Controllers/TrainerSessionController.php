<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    public function index()
    {
        $trainingSessions = TrainingSession::all();
        return response()->json($trainingSessions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'session_date' => 'required|date',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'trainer_id' => 'required|exists:trainers,id',
        ]);

        $trainingSession = TrainingSession::create($request->all());

        return response()->json([
            'message' => 'Training session created successfully!',
            'trainingSession' => $trainingSession,
        ], 201);
    }

    public function show($id)
    {
        $trainingSession = TrainingSession::findOrFail($id);
        return response()->json($trainingSession);
    }

    public function update(Request $request, $id)
    {
        $trainingSession = TrainingSession::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'session_date' => 'date',
            'description' => 'nullable|string',
            'price' => 'numeric|min:0',
            'trainer_id' => 'exists:trainers,id',
        ]);

        $trainingSession->update($request->all());

        return response()->json([
            'message' => 'Training session updated successfully!',
            'trainingSession' => $trainingSession,
        ]);
    }

    public function destroy($id)
    {
        $trainingSession = TrainingSession::findOrFail($id);
        $trainingSession->delete();

        return response()->json([
            'message' => 'Training session deleted successfully!',
        ]);
    }
}

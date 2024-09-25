<?php

namespace App\Http\Controllers;

use App\Models\TrainingSession;
use Illuminate\Http\Request;
use App\Models\Trainer; 

class TrainingSessionController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sortField', 'name'); // Поле для сортування (за замовчуванням 'name')
        $sortDirection = $request->get('sortDirection', 'asc'); // Напрямок сортування (за замовчуванням 'asc')
    
        $trainingSessions = TrainingSession::orderBy($sortField, $sortDirection)->get();
    
        return view('training_session.index', compact('trainingSessions', 'sortField', 'sortDirection'));
    }
    

    public function create()
    {
        $trainers = Trainer::all();
        return view('training_session.create', compact('trainers'));
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

        TrainingSession::create($request->all());

        return redirect()->route('training_session.index')->with('success', 'Training session created successfully!');
    }

    public function show($id)
    {
        $trainingSession = TrainingSession::findOrFail($id);
        return view('training_session.show', compact('trainingSession'));
    }

    public function edit($id)
    {
        $trainingSession = TrainingSession::findOrFail($id);
        return view('training_session.edit', compact('trainingSession'));
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

        return redirect()->route('training_session.index')->with('success', 'Training session updated successfully!');
    }

    public function destroy($id)
    {
        $trainingSession = TrainingSession::findOrFail($id);
        $trainingSession->delete();

        return redirect()->route('training_session.index')->with('success', 'Training session deleted successfully!');
    }
}

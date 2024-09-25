<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainer.index', compact('trainers')); // Повертаємо вьюшку з тренерами
    }

    public function create()
    {
        return view('trainer.create'); // Повертаємо вьюшку для створення нового тренера
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $trainer = Trainer::create($request->all());

        return redirect()->route('trainer.index')
                         ->with('success', 'Trainer created successfully!');
    }

    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainer.show', compact('trainer')); // Повертаємо вьюшку для показу тренера
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainer.edit', compact('trainer')); // Повертаємо вьюшку для редагування тренера
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

        return redirect()->route('trainer.index')->with('success', 'Trainer updated successfully!');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return redirect()->route('trainer.index')->with('success', 'Trainer deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create'); // Повертаємо вьюшку для створення нового відгуку
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Feedback::create($request->all());

        return redirect()->route('feedback.index')->with('success', 'Feedback created successfully!');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedback.show', compact('feedback')); // Повертаємо вьюшку для показу відгуку
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedback.edit', compact('feedback')); // Повертаємо вьюшку для редагування відгуку
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $request->validate([
            'text' => 'string|max:255',
            'product_id' => 'exists:products,id',
            'user_id' => 'exists:users,id',
        ]);

        $feedback->update($request->all());

        return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully!');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully!');
    }
}

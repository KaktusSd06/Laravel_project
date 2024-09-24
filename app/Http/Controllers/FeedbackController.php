<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $feedback = Feedback::create($request->all());

        return response()->json([
            'message' => 'Feedback created successfully!',
            'feedback' => $feedback,
        ], 201);
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return response()->json($feedback);
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

        return response()->json([
            'message' => 'Feedback updated successfully!',
            'feedback' => $feedback,
        ]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return response()->json([
            'message' => 'Feedback deleted successfully!',
        ]);
    }
}

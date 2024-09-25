<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sortField', 'name');
        $sortDirection = $request->get('sortDirection', 'asc');
    
        $users = User::orderBy($sortField, $sortDirection)->get();
    
        return view('user.index', compact('users', 'sortField', 'sortDirection'));
    }
    

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'password' => 'required|string|min:8',
            'isAdmin' => 'boolean',
        ]);
    
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
    
        User::create($data);
    
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }
    

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user')); // Повертаємо вьюшку для показу користувача
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user')); // Повертаємо вьюшку для редагування користувача
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'surname' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'phone_number' => 'string|max:20',
            'birth_date' => 'date',
            'isAdmin' => 'boolean',
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}

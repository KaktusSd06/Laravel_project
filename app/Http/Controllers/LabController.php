<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Your Name', 'role' => 'Student'];
        return view('welcome', $data);
    }

    public function about()
    {
        $data = ['name' => 'Your Name', 'role' => 'Student', 'description' => 'About description here.'];
        return view('about', $data);
    }

    public function contact()
    {
        $data = ['email' => 'your.email@example.com', 'phone' => '+123456789'];
        return view('contact', $data);
    }

    public function hobby()
    {
        $data = [];
        return view('hobbies', $data);
    }
}

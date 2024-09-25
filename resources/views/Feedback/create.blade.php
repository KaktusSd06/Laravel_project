@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Add New Feedback</h2>

        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" class="form-control" name="text" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID</label>
                <input type="number" class="form-control" name="product_id" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Feedback</h2>

        <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" class="form-control" name="text" value="{{ $feedback->text }}" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID</label>
                <input type="number" class="form-control" name="product_id" value="{{ $feedback->product_id }}" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" value="{{ $feedback->user_id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Add New Membership</h2>

        <form action="{{ route('membership.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" min="0" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

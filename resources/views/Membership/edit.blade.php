@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Membership</h2>

        <form action="{{ route('membership.update', $membership->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" value="{{ $membership->type }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{ $membership->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{ $membership->end_date }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $membership->price }}" min="0" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" value="{{ $membership->user_id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

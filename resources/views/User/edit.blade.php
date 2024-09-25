@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit User</h2>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" name="surname" value="{{ $user->surname }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" name="birth_date" value="{{ $user->birth_date }}" required>
            </div>
            <div class="form-group">
                <label for="isAdmin">Is Admin</label>
                <select class="form-control" name="isAdmin">
                    <option value="0" {{ !$user->isAdmin ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $user->isAdmin ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

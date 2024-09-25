@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Trainer</h2>

        <form action="{{ route('trainer.update', $trainer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ $trainer->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ $trainer->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization</label>
                <input type="text" class="form-control" name="specialization" value="{{ $trainer->specialization }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

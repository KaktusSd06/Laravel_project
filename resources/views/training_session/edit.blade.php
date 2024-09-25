@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Training Session</h1>

        <form action="{{ route('training_session.update', $trainingSession->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $trainingSession->name }}" required>
            </div>
            <div class="form-group">
                <label for="session_date">Session Date</label>
                <input type="datetime-local" class="form-control" id="session_date" name="session_date" value="{{ $trainingSession->session_date->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $trainingSession->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $trainingSession->price }}" required>
            </div>
            <div class="form-group">
                <label for="trainer_id">Trainer</label>
                <select class="form-control" id="trainer_id" name="trainer_id" required>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}" {{ $trainer->id == $trainingSession->trainer_id ? 'selected' : '' }}>
                            {{ $trainer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

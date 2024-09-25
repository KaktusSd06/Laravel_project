@extends('layout')

@section('content')
    <div class="container">
        <h1>Training Session Details</h1>

        <p><strong>Name:</strong> {{ $trainingSession->name }}</p>
        <p><strong>Session Date:</strong> {{ $trainingSession->session_date }}</p>
        <p><strong>Description:</strong> {{ $trainingSession->description }}</p>
        <p><strong>Price:</strong> {{ $trainingSession->price }}</p>
        <p><strong>Trainer:</strong> {{ $trainingSession->trainer->name }}</p>

        <a href="{{ route('training_session.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection

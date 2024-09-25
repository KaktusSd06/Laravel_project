@extends('layout')

@section('content')
    <div class="container">
        <h1>Training Sessions</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('training_session.create') }}" class="btn btn-primary mb-3">Add New Training Session</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Session Date</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainingSessions as $session)
                    <tr>
                        <td>{{ $session->name }}</td>
                        <td>{{ $session->session_date->format('Y-m-d H:i') }}</td>
                        <td>{{ $session->price }}</td>
                        <td>
                            <a href="{{ route('training_session.edit', $session->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('training_session.destroy', $session->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

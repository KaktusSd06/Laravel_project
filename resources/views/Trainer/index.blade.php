@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Trainer List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('trainer.create') }}" class="btn btn-success mb-3">Add New Trainer</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainers as $trainer)
                    <tr>
                        <td>{{ $trainer->id }}</td>
                        <td>{{ $trainer->first_name }}</td>
                        <td>{{ $trainer->last_name }}</td>
                        <td>{{ $trainer->specialization }}</td>
                        <td>
                            <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('trainer.destroy', $trainer->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

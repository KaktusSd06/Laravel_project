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
                    <th><a href="{{ route('trainer.index', ['sortField' => 'id', 'sortDirection' => ($sortField == 'id' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">ID</a></th>
                    <th><a href="{{ route('trainer.index', ['sortField' => 'first_name', 'sortDirection' => ($sortField == 'first_name' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">First Name</a></th>
                    <th><a href="{{ route('trainer.index', ['sortField' => 'last_name', 'sortDirection' => ($sortField == 'last_name' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">Last Name</a></th>
                    <th><a href="{{ route('trainer.index', ['sortField' => 'specialization', 'sortDirection' => ($sortField == 'specialization' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">Specialization</a></th>
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

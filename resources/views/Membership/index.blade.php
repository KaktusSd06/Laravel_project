@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Membership List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('membership.create') }}" class="btn btn-success mb-3">Add New Membership</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $membership)
                    <tr>
                        <td>{{ $membership->id }}</td>
                        <td>{{ $membership->type }}</td>
                        <td>{{ $membership->start_date }}</td>
                        <td>{{ $membership->end_date }}</td>
                        <td>{{ $membership->price }}</td>
                        <td>{{ $membership->user_id }}</td>
                        <td>
                            <a href="{{ route('membership.edit', $membership->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('membership.destroy', $membership->id) }}" method="POST" style="display:inline-block;">
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

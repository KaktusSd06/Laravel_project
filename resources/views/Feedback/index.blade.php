@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Feedback List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('feedback.create') }}" class="btn btn-success mb-3">Add New Feedback</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('feedback.index', ['sortField' => 'id', 'sortDirection' => ($sortField == 'id' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            ID
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('feedback.index', ['sortField' => 'text', 'sortDirection' => ($sortField == 'text' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            Text
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('feedback.index', ['sortField' => 'product_id', 'sortDirection' => ($sortField == 'product_id' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            Product ID
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('feedback.index', ['sortField' => 'user_id', 'sortDirection' => ($sortField == 'user_id' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            User ID
                        </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->text }}</td>
                        <td>{{ $feedback->product_id }}</td>
                        <td>{{ $feedback->user_id }}</td>
                        <td>
                            <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline-block;">
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

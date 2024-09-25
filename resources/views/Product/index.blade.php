@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Product List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('products.index', ['sortField' => 'id', 'sortDirection' => ($sortField == 'id' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            ID
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('products.index', ['sortField' => 'name', 'sortDirection' => ($sortField == 'name' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            Name
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('products.index', ['sortField' => 'price', 'sortDirection' => ($sortField == 'price' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                            Price
                        </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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

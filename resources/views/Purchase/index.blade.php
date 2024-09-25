@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Purchase List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('purchase.create') }}" class="btn btn-success mb-3">Add New Purchase</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Purchase Date</th>
                    <th>Total Price</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Training Session ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>{{ $purchase->total_price }}</td>
                        <td>{{ $purchase->user_id }}</td>
                        <td>{{ $purchase->product_id }}</td>
                        <td>{{ $purchase->training_session_id }}</td>
                        <td>
                            <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
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

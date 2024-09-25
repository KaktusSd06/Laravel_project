@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Add New Purchase</h2>

        <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" name="total_price" min="0" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID (optional)</label>
                <input type="number" class="form-control" name="product_id">
            </div>
            <div class="form-group">
                <label for="training_session_id">Training Session ID (optional)</label>
                <input type="number" class="form-control" name="training_session_id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

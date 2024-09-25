@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Purchase</h2>

        <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" value="{{ $purchase->purchase_date }}" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" name="total_price" value="{{ $purchase->total_price }}" min="0" required>
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" value="{{ $purchase->user_id }}" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID (optional)</label>
                <input type="number" class="form-control" name="product_id" value="{{ $purchase->product_id }}">
            </div>
            <div class="form-group">
                <label for="training_session_id">Training Session ID (optional)</label>
                <input type="number" class="form-control" name="training_session_id" value="{{ $purchase->training_session_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

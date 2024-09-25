@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection

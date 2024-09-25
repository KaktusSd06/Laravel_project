@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
            </div>

            <button type="submit" class="btn btn-success mt-3">Create</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection

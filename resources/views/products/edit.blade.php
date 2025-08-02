@extends('layouts.app')
@section('content')
<h1>Edit Product</h1>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PATCH')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" required>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>

    <button type="submit">Update Product</button>
</form>

<a href="{{ route('products.index') }}">Back to Products List</a>
@endsection

@extends('layouts.app')

@section('content')
<h1>Create New Product</h1>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>

    <button type="submit">Create Product</button>
</form>

<a href="{{ route('products.index') }}">Back to Products List</a>
@endsection

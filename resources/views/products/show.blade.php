@extends('layouts.app')
@section('content')
<h1>Product Details</h1>

<p><strong>Name:</strong> {{ $product->name }}</p>
<p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

<a href="{{ route('products.index') }}">Back to Products List</a>
@endsection

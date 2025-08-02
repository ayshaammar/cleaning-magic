@extends('layouts.app')
@section('content')
<h1>Products List</h1>
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
<a href="{{ route('products.create') }}">Create New Product</a>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}">Edit</a> |
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3">No products found.</td></tr>
        @endforelse
    </tbody>
</table>
{{ $products->links() }}
@endsection

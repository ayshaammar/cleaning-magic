@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Orders List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create New Order</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Execution Date</th>
                    <th>Delivery Date</th>
                    <th>Payment Method</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Products</th>
                    <th style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                    <td>{{ $order->execution_date ? \Carbon\Carbon::parse($order->execution_date)->format('Y-m-d') : '-' }}</td>
                    <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('Y-m-d') : '-' }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <ul>
                            @foreach($order->products as $product)
                                <li>
                                    {{ $product->name }} 
                                    (Qty: {{ $product->pivot->quantity }}, 
                                    Price: ${{ number_format($product->pivot->price, 2) }})
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm me-1">Show</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this order?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection

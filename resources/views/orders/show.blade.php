@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Order Details</h1>

    <div class="card p-4 shadow-sm">
        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
        <p><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</p>
        <p><strong>Execution Date:</strong> {{ $order->execution_date ? \Carbon\Carbon::parse($order->execution_date)->format('Y-m-d') : '-' }}</p>
        <p><strong>Delivery Date:</strong> {{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('Y-m-d') : '-' }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>

        {{-- عرض المنتجات المرتبطة إذا وجدت --}}
        @if($order->products && $order->products->count())
            <h4 class="mt-4">Products in this order:</h4>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price ($)</th>
                        <th>Total ($)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ number_format($product->pivot->price, 2) }}</td>
                            <td>{{ number_format($product->pivot->quantity * $product->pivot->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- حساب المجموع الكلي للطلب --}}
            @php
                $total = $order->products->reduce(function($carry, $product) {
                    return $carry + ($product->pivot->quantity * $product->pivot->price);
                }, 0);
            @endphp
            <p class="fw-bold text-end">Total Order Price: ${{ number_format($total, 2) }}</p>
        @endif

        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders List</a>
    </div>
</div>
@endsection

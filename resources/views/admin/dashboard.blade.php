@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h1>Admin </h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3 bg-primary text-white">
                <h4>Total Products</h4>
                <p>{{ \App\Models\Product::count() }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-success text-white">
                <h4>Pending Orders</h4>
                <p>{{ \App\Models\Order::where('status', 'pending')->count() }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-info text-white">
                <h4>Total Customers</h4>
                <p>{{ \App\Models\User::where('role', 'customer')->count() }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-warning text-dark">
                <h4>Completed Orders</h4>
                <p>{{ \App\Models\Order::where('status', 'completed')->count() }}</p>
            </div>
        </div>
    </div>

    <h3>Recent Orders</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\Order::latest()->take(5)->get() as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Manage Orders</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection

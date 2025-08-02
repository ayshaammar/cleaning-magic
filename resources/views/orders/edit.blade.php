@extends('layouts.app')

@section('content')
<h1>Edit Order</h1>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PATCH')

    <label>Order Number:</label>
    <input type="text" name="order_number" value="{{ old('order_number', $order->order_number) }}" required>

    <label>Order Date:</label>
    <input type="date" name="order_date" value="{{ old('order_date', $order->order_date->format('Y-m-d')) }}" required>

    <label>Execution Date:</label>
    <input type="date" name="execution_date" value="{{ old('execution_date', optional($order->execution_date)->format('Y-m-d')) }}" required>

    <label>Delivery Date:</label>
    <input type="date" name="delivery_date" value="{{ old('delivery_date', optional($order->delivery_date)->format('Y-m-d')) }}" required>

    <label>Payment Method:</label>
    <input type="text" name="payment_method" value="{{ old('payment_method', $order->payment_method) }}" required>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $order->email) }}" required>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $order->phone) }}" required>

    <label>Customer Name:</label>
    <input type="text" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>

    <label>National ID:</label>
    <input type="text" name="national_id" value="{{ old('national_id', $order->national_id) }}" required>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $order->date_of_birth->format('Y-m-d')) }}" required>

    <label>Country:</label>
    <input type="text" name="address_country" value="{{ old('address_country', $order->address_country) }}" required>

    <label>Province:</label>
    <input type="text" name="address_province" value="{{ old('address_province', $order->address_province) }}" required>

    <label>City:</label>
    <input type="text" name="address_city" value="{{ old('address_city', $order->address_city) }}" required>

    <label>Near Landmark:</label>
    <input type="text" name="address_near_landmark" value="{{ old('address_near_landmark', $order->address_near_landmark) }}">

    <label>Mastercard Number:</label>
    <input type="text" name="mastercard_number" value="{{ old('mastercard_number', $order->mastercard_number) }}">

    <h3>Products:</h3>
    <div>
        @foreach ($products as $index => $product)
            @php
                // محاولة إيجاد المنتج في الطلب الحالي
                $orderProduct = $order->products->firstWhere('id', $product->id);
                $quantity = old("products.$index.quantity", $orderProduct ? $orderProduct->pivot->quantity : 1);
                $price = old("products.$index.price", $orderProduct ? $orderProduct->pivot->price : $product->price);
            @endphp

            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <input type="hidden" name="products[{{ $index }}][product_id]" value="{{ $product->id }}">
                <strong>{{ $product->name }} - ${{ $product->price }}</strong><br>
                <label>Quantity:</label>
                <input type="number" name="products[{{ $index }}][quantity]" min="1" value="{{ $quantity }}">
                <label>Price:</label>
                <input type="number" step="0.01" name="products[{{ $index }}][price]" value="{{ $price }}">
            </div>
        @endforeach
    </div>

    <button type="submit">Update Order</button>
</form>

<a href="{{ route('orders.index') }}">Back to Orders List</a>
@endsection

@extends('layouts.app')
@section('content')
<h1>Edit Profile</h1>
@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')
    <label>Name</label><br>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    @error('name') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    @error('email') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Date of Birth</label><br>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
    @error('date_of_birth') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>National ID</label><br>
    <input type="text" name="national_id" value="{{ old('national_id', $user->national_id) }}">
    @error('national_id') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Country</label><br>
    <input type="text" name="address_country" value="{{ old('address_country', $user->address_country) }}">
    @error('address_country') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Province</label><br>
    <input type="text" name="address_province" value="{{ old('address_province', $user->address_province) }}">
    @error('address_province') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>City</label><br>
    <input type="text" name="address_city" value="{{ old('address_city', $user->address_city) }}">
    @error('address_city') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Nearest Landmark</label><br>
    <input type="text" name="address_near_landmark" value="{{ old('address_near_landmark', $user->address_near_landmark) }}">
    @error('address_near_landmark') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <label>Mastercard Number</label><br>
    <input type="text" name="mastercard_number" value="{{ old('mastercard_number', $user->mastercard_number) }}">
    @error('mastercard_number') <div style="color:red;">{{ $message }}</div> @enderror
    <br>
    <button type="submit">Update Profile</button>
</form>
@endsection

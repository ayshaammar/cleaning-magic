@extends('layouts.app')

@section('title', 'About Us - Magic Clean')

@section('content')
<section class="about-section container">
  <h1>About Us</h1>
  <p>Integrated Cleaning Services was founded with a simple but powerful goal: to provide high-quality cleaning services that meet the needs of individuals and businesses in a safe and healthy environment.</p>
  <p>We understand that cleaning is not just a routine task, but a crucial foundation for maintaining human health and comfort. That's why we focus on using environmentally friendly products that are safe for everyone.</p>
  <p>Our team is made up of highly trained professionals who use the latest techniques and equipment to ensure top-quality service every time. Our mission is to go beyond expectations and build lasting relationships with our clients based on trust, excellence, and reliability.</p>
  <img src="{{ asset('img/about_us.jpg') }}" alt="Cleaning Team" style="width:100%; border-radius:10px; margin-top:20px;">
</section>
@endsection

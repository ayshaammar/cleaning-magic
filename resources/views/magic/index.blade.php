@extends('layouts.app')

@section('title', 'Integrated Cleaning Services')

@section('content')
<div class="slider-container">
  <div class="slider" id="slider">
    <div class="slide">
      <img src="{{ asset('img/IMG-20250522-WA0003.jpg') }}" alt="1" />
      <div class="slide-text">
        <h2>Top Quality Cleaning Services</h2>
        <p>Providing safe and effective cleaning solutions for homes and businesses.</p>
      </div>
    </div>
    <div class="slide">
      <img src="{{ asset('img/IMG-20250522-WA0002.jpg') }}" alt="Office Cleaning" />
      <div class="slide-text">
        <h2>Efficient Office Cleaning</h2>
        <p>Maintaining a healthy and productive environment for your office and staff.</p>
      </div>
    </div>
    <div class="slide">
      <img src="{{ asset('img/IMG-20250522-WA0001.jpg') }}" alt="Home Cleaning" />
      <div class="slide-text">
        <h2>Reliable Home Cleaning</h2>
        <p>Eco-friendly and thorough cleaning to make your home sparkle.</p>
      </div>
    </div>
  </div>
  <button class="prev" onclick="moveSlide(-1)">❮</button>
  <button class="next" onclick="moveSlide(1)">❯</button>
</div>

<section class="main-wrapper">
  <h2 class="section-title" id="services">Our Services</h2>

  <div class="pairs-wrapper">
    <div class="pair">
      <div class="card">
        <img src="{{ asset('img/service1.jpg') }}" alt="Home Cleaning" />
        <h3>Home Cleaning</h3>
        <p>Comprehensive home cleaning services using eco-friendly products to keep your home safe and fresh.</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/service2.jpg') }}" alt="Office Cleaning" />
        <h3>Office Cleaning</h3>
        <p>Top-notch office cleaning to maintain a healthy and productive environment for your team.</p>
      </div>
    </div>
    <div class="pair">
      <div class="card">
        <img src="{{ asset('img/service3.jpg') }}" alt="Car Cleaning" />
        <h3>Car Cleaning</h3>
        <p>Interior and exterior car cleaning with the latest equipment and cleaning products.</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/service4.jpg') }}" alt="Mosque Cleaning" />
        <h3>Mosque Cleaning</h3>
        <p>Professional cleaning services for mosques, ensuring a hygienic and peaceful environment.</p>
      </div>
    </div>
  </div>

  <h2 class="section-title">Our Products</h2>

  <div class="pairs-wrapper" id="products">
    <div class="pair">
      <div class="card">
        <img src="{{ asset('img/product1.jpg') }}" alt="Eco-friendly Cleaner" />
        <h3>Eco-friendly Cleaner</h3>
        <p>A safe, natural cleaner for all surfaces, leaving your home fresh and free from harmful chemicals.</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/product2.jpg') }}" alt="Disinfectant" />
        <h3>Disinfectant</h3>
        <p>Powerful disinfectant that kills 99.9% of germs and bacteria, perfect for high-touch surfaces.</p>
      </div>
    </div>
    <div class="pair">
      <div class="card">
        <img src="{{ asset('img/product3.jpg') }}" alt="Glass Cleaner" />
        <h3>Glass Cleaner</h3>
        <p>Achieve streak-free, sparkling glass surfaces with our specially formulated glass cleaner.</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/product4.jpg') }}" alt="Carpet Cleaner" />
        <h3>Carpet Cleaner</h3>
        <p>Deep cleaning solution for carpets, removing dirt and stains while preserving fabric integrity.</p>
      </div>
    </div>
  </div>
</section>

<section class="why-choose-us" id="why-us">
  <div class="container">
    <h2>Why Choose Us?</h2>
    <ul class="reasons">
      <li>Safe and effective cleaning products that maintain your family's health and environment.</li>
      <li>A specialized team using the latest cleaning methods and techniques.</li>
      <li>Flexible service schedules & quick response to emergencies.</li>
      <li>Thorough cleaning that preserves the quality of fabrics and surfaces.</li>
      <li>Competitive pricing and ongoing offers that fit your budget.</li>
      <li>Comprehensive services including homes, offices, cars, mosques, and more.</li>
    </ul>
    <p class="note">
      We believe that every client deserves the best service — that’s why we put you at the heart of our mission.
      Try our services and feel the difference in cleanliness and professionalism.
    </p>
  </div>
</section>

<section class="testimonials-section" id="testimonials">
  <div class="container">
    <h2 class="section-title">Client Testimonials</h2>
    <div class="testimonial-card">
      <p class="quote">"Excellent service and a professional team. I highly recommend their cleaning services for any home."</p>
      <span class="client-name">– Sarah Mohammed</span>
    </div>
    <div class="testimonial-card">
      <p class="quote">"Great quality products and amazing offers. Overall an excellent experience."</p>
      <span class="client-name">– Ahmed Ali</span>
    </div>
    <div class="testimonial-card">
      <p class="quote">"Fast and efficient cleaning. The staff was polite and helpful."</p>
      <span class="client-name">– Reem Abdullah</span>
    </div>
  </div>
</section>
@endsection

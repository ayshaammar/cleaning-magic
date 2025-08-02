@extends('layouts.app')

@section('title', 'Contact Us - Magic Clean')

@section('content')
<section class="contact-section container">
  <h1>Contact Us</h1>
  <p>Don't wait for dirt to accumulate, contact us today and enjoy exceptional cleaning services that prioritize your health and peace of mind!</p>
  <p>Book now and take advantage of our special offers through our website or by direct contact.</p>
  <p>We are here to help you create a clean, healthy, and attractive environment for you and your loved ones.</p>

  <form id="contact-form">
    <label for="name">Full Name:</label>
    <input type="text" id="name" placeholder="Full Name" required />

    <label for="email">Email Address:</label>
    <input type="email" id="email" placeholder="example@mail.com" required />

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" placeholder="+1234567890" required />

    <label for="message">Message:</label>
    <textarea id="message" rows="6" placeholder="Write your message here" required></textarea>

    <button type="submit">Submit</button>
  </form>

  <p id="success-message" style="color:green; display:none; margin-top: 10px;">
    Thank you for reaching out! We will get back to you soon.
  </p>
</section>
@endsection

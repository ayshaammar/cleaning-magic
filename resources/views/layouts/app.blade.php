<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Magic Clean')</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
<header>
  <div class="container header-container">
    <div class="logo">magic clean</div>
   <nav>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        @auth
            @if(auth()->user()->role == 'admin')
                <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
            @elseif(auth()->user()->role == 'customer')
                <li><a href="{{ route('orders.index') }}">My Orders</a></li>
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li> 
            <li><a href="{{ route('about') }}" class="{{ Request::is('magic.about') ? 'active' : '' }}">About Us</a></li>
            <li><a href="{{ route('gallery') }}" class="{{ Request::is('magic.gallery') ? 'active' : '' }}">Gallery</a></li>
            <li><a href="{{ route('contact') }}" class="{{ Request::is('magic.contact') ? 'active' : '' }}">Contact Us</a></li>

        @endauth
    </ul>
</nav>

  </div>
</header>

<main>
  @yield('content')
</main>

<a href="#" class="back-to-top" id="backToTop">↑</a>

<footer>
  <div class="container footer-container">
    <p>&copy; MAGIC CLEAN</p>
  </div>
</footer>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

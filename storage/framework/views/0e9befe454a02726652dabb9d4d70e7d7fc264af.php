<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $__env->yieldContent('title', 'Magic Clean'); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>" />
</head>
<body>
<header>
  <div class="container header-container">
    <div class="logo">magic clean</div>
   <nav>
    <ul>
        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->role == 'admin'): ?>
                <li><a href="<?php echo e(route('admin.dashboard')); ?>">Admin Dashboard</a></li>
                <li><a href="<?php echo e(route('products.index')); ?>">Products</a></li>
                <li><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
            <?php elseif(auth()->user()->role == 'customer'): ?>
                <li><a href="<?php echo e(route('orders.index')); ?>">My Orders</a></li>
                <li><a href="<?php echo e(route('profile.edit')); ?>">Profile</a></li>
            <?php endif; ?>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Logout</button>
                </form>
            </li>
        <?php else: ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>">Register</a></li> 
            <li><a href="<?php echo e(route('about')); ?>" class="<?php echo e(Request::is('magic.about') ? 'active' : ''); ?>">About Us</a></li>
            <li><a href="<?php echo e(route('gallery')); ?>" class="<?php echo e(Request::is('magic.gallery') ? 'active' : ''); ?>">Gallery</a></li>
            <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(Request::is('magic.contact') ? 'active' : ''); ?>">Contact Us</a></li>

        <?php endif; ?>
    </ul>
</nav>

  </div>
</header>

<main>
  <?php echo $__env->yieldContent('content'); ?>
</main>

<a href="#" class="back-to-top" id="backToTop">↑</a>

<footer>
  <div class="container footer-container">
    <p>&copy; MAGIC CLEAN</p>
  </div>
</footer>

<script src="<?php echo e(asset('js/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\Moon A\magic-clean\resources\views/layouts/app.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h1>Admin </h1>
    <p>Welcome, <?php echo e(auth()->user()->name); ?>!</p>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3 bg-primary text-white">
                <h4>Total Products</h4>
                <p><?php echo e(\App\Models\Product::count()); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-success text-white">
                <h4>Pending Orders</h4>
                <p><?php echo e(\App\Models\Order::where('status', 'pending')->count()); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-info text-white">
                <h4>Total Customers</h4>
                <p><?php echo e(\App\Models\User::where('role', 'customer')->count()); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 bg-warning text-dark">
                <h4>Completed Orders</h4>
                <p><?php echo e(\App\Models\Order::where('status', 'completed')->count()); ?></p>
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
            <?php $__currentLoopData = \App\Models\Order::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order->order_number); ?></td>
                <td><?php echo e($order->user->name); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($order->order_date)->format('Y-m-d')); ?></td>
                <td><?php echo e(ucfirst($order->status)); ?></td>
                <td>$<?php echo e(number_format($order->total_price, 2)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-4">
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Manage Products</a>
        <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">Manage Orders</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
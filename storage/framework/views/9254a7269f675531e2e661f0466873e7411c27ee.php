

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h1 class="mb-4">Order Details</h1>

    <div class="card p-4 shadow-sm">
        <p><strong>Order Number:</strong> <?php echo e($order->order_number); ?></p>
        <p><strong>Order Date:</strong> <?php echo e(\Carbon\Carbon::parse($order->order_date)->format('Y-m-d')); ?></p>
        <p><strong>Execution Date:</strong> <?php echo e($order->execution_date ? \Carbon\Carbon::parse($order->execution_date)->format('Y-m-d') : '-'); ?></p>
        <p><strong>Delivery Date:</strong> <?php echo e($order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('Y-m-d') : '-'); ?></p>
        <p><strong>Payment Method:</strong> <?php echo e($order->payment_method); ?></p>
        <p><strong>Email:</strong> <?php echo e($order->email); ?></p>
        <p><strong>Phone:</strong> <?php echo e($order->phone); ?></p>

        
        <?php if($order->products && $order->products->count()): ?>
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
                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->pivot->quantity); ?></td>
                            <td><?php echo e(number_format($product->pivot->price, 2)); ?></td>
                            <td><?php echo e(number_format($product->pivot->quantity * $product->pivot->price, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <?php
                $total = $order->products->reduce(function($carry, $product) {
                    return $carry + ($product->pivot->quantity * $product->pivot->price);
                }, 0);
            ?>
            <p class="fw-bold text-end">Total Order Price: $<?php echo e(number_format($total, 2)); ?></p>
        <?php endif; ?>

        <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary mt-3">Back to Orders List</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/orders/show.blade.php ENDPATH**/ ?>
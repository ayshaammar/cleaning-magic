

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <h1 class="mb-4">Orders List</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-primary mb-3">Create New Order</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Execution Date</th>
                    <th>Delivery Date</th>
                    <th>Payment Method</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Products</th>
                    <th style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($order->order_number); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($order->order_date)->format('Y-m-d')); ?></td>
                    <td><?php echo e($order->execution_date ? \Carbon\Carbon::parse($order->execution_date)->format('Y-m-d') : '-'); ?></td>
                    <td><?php echo e($order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('Y-m-d') : '-'); ?></td>
                    <td><?php echo e($order->payment_method); ?></td>
                    <td><?php echo e($order->email); ?></td>
                    <td><?php echo e($order->phone); ?></td>
                    <td>
                        <ul>
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($product->name); ?> 
                                    (Qty: <?php echo e($product->pivot->quantity); ?>, 
                                    Price: $<?php echo e(number_format($product->pivot->price, 2)); ?>)
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td>
                        <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn btn-info btn-sm me-1">Show</a>
                        <a href="<?php echo e(route('orders.edit', $order)); ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="<?php echo e(route('orders.destroy', $order)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this order?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="text-center">No orders found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/orders/index.blade.php ENDPATH**/ ?>
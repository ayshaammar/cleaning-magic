
<?php $__env->startSection('content'); ?>
<h1>Products List</h1>
<?php if(session('success')): ?>
    <div><?php echo e(session('success')); ?></div>
<?php endif; ?>
<a href="<?php echo e(route('products.create')); ?>">Create New Product</a>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($product->name); ?></td>
            <td>$<?php echo e(number_format($product->price, 2)); ?></td>
            <td>
                <a href="<?php echo e(route('products.edit', $product)); ?>">Edit</a> |
                <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this product?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="3">No products found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<?php echo e($products->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/products/index.blade.php ENDPATH**/ ?>
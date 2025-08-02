

<?php $__env->startSection('content'); ?>
<h1>Create New Product</h1>

<?php if($errors->any()): ?>
<div>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li style="color:red;"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('products.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?php echo e(old('price')); ?>" required>

    <button type="submit">Create Product</button>
</form>

<a href="<?php echo e(route('products.index')); ?>">Back to Products List</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/products/create.blade.php ENDPATH**/ ?>
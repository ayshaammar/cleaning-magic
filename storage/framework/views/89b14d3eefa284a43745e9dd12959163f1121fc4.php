

<?php $__env->startSection('content'); ?>
<h1>Create New Order</h1>

<?php if($errors->any()): ?>
<div>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li style="color:red;"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>



<form action="<?php echo e(route('orders.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label>Order Number:</label>
    <input type="text" name="order_number" value="<?php echo e(old('order_number')); ?>" required>

    <label>Order Date:</label>
    <input type="date" name="order_date" value="<?php echo e(old('order_date')); ?>" required>

    <label>Execution Date:</label>
    <input type="date" name="execution_date" value="<?php echo e(old('execution_date')); ?>" required>

    <label>Delivery Date:</label>
    <input type="date" name="delivery_date" value="<?php echo e(old('delivery_date')); ?>" required>

    <label>Payment Method:</label>
    <input type="text" name="payment_method" value="<?php echo e(old('payment_method')); ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" required>

    <label>Customer Name:</label>
    <input type="text" name="customer_name" value="<?php echo e(old('customer_name')); ?>" required>

    <label>National ID:</label>
    <input type="text" name="national_id" value="<?php echo e(old('national_id')); ?>" required>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" required>

    <label>Country:</label>
    <input type="text" name="address_country" value="<?php echo e(old('address_country')); ?>" required>

    <label>Province:</label>
    <input type="text" name="address_province" value="<?php echo e(old('address_province')); ?>" required>

    <label>City:</label>
    <input type="text" name="address_city" value="<?php echo e(old('address_city')); ?>" required>

    <label>Near Landmark:</label>
    <input type="text" name="address_near_landmark" value="<?php echo e(old('address_near_landmark')); ?>">

    <label>Mastercard Number:</label>
    <input type="text" name="mastercard_number" value="<?php echo e(old('mastercard_number')); ?>">

    <h3>Products:</h3>
    <div>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <input type="hidden" name="products[<?php echo e($index); ?>][product_id]" value="<?php echo e($product->id); ?>">
                <strong><?php echo e($product->name); ?> - $<?php echo e($product->price); ?></strong><br>
                <label>Quantity:</label>
                <input type="number" name="products[<?php echo e($index); ?>][quantity]" min="1" value="<?php echo e(old("products.$index.quantity") ?? 1); ?>">
                <label>Price:</label>
                <input type="number" step="0.01" name="products[<?php echo e($index); ?>][price]" value="<?php echo e(old("products.$index.price") ?? $product->price); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button type="submit">Create Order</button>
</form>


<a href="<?php echo e(route('orders.index')); ?>">Back to Orders List</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/orders/create.blade.php ENDPATH**/ ?>
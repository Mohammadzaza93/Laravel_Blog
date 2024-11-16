

<?php $__env->startSection('title', __('Create Article')); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold"><?php echo e(__('Create New Article')); ?></h1>
    </div>
   
    <!-- Form to Create New Article -->
    <form action="/blog" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Title Input -->
        <div class="form-group">
            <label for="title"><?php echo e(__('Title')); ?></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="<?php echo e(__('Enter the title')); ?>" required>
        </div>

        <!-- Description Input -->
        <div class="form-group">
            <label for="description"><?php echo e(__('Description')); ?></label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="<?php echo e(__('Enter the description')); ?>" required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image"><?php echo e(__('Select an image to upload')); ?></label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="btn btn-success"><?php echo e(__('Submit the Post')); ?></button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Blog\resources\views/blog/create.blade.php ENDPATH**/ ?>
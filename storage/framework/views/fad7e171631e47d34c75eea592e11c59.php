

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <!-- Display Session Message -->
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success text-center">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>

    <!-- Header Section -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold">All Posts</h1>
    </div>

    <!-- Create New Post Button -->
    <?php if(Auth::check()): ?>
        <div class="text-right mb-4">
            <a href="/blog/create" class="btn btn-lg btn-primary"><?php echo e(__('Create New Title')); ?></a>
        </div>
    <?php endif; ?>

    <!-- Posts Section -->
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Post Image -->
                    <img src="/images/<?php echo e($post->image_path); ?>" class="card-img-top" alt="<?php echo e($post->title); ?>">

                    <!-- Post Details -->
                    <div class="card-body">
                        <h2 class="card-title"><?php echo e($post->title); ?></h2>
                        <p class="text-muted">BY: <span class="font-weight-bold"><?php echo e($post->user->name); ?></span></p>
                        <p class="text-muted">On: <span><?php echo e($post->updated_at->format('m-d-Y')); ?></span></p>
                        <p class="card-text"><?php echo e(Str::limit($post->description, 100, '...')); ?></p>
                        <a href="/blog/<?php echo e($post->slug); ?>" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Blog\resources\views/blog/index.blade.php ENDPATH**/ ?>
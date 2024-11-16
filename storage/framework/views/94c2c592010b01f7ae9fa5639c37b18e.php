

<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <!-- Hero Section -->
    <div class="jumbotron text-center bg-light p-5 rounded shadow-sm">
        <h1 class="display-4">Welcome to My Blog</h1>
        <p class="lead">Explore articles on a variety of topics and stay updated with the latest posts.</p>
        <a href="/" class="btn btn-primary btn-lg mt-3">Start Reading</a>
    </div>

    <!-- Additional Content Section -->
    <div class="mt-5 text-center">
        <h2>Discover the Latest Posts</h2>
        <p>Stay tuned for more updates, tips, and insights from the world of blogging.</p>
        <a href="/blog" class="btn btn-outline-secondary btn-lg">View All Posts</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Blog\resources\views/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <!-- Display Session Messages -->
    <?php if(session()->has('message')): ?>
        <div class="alert alert-info">
            <?php echo e(session()->get('message')); ?>

        </div>
    <?php endif; ?>

    <!-- Post Title -->
    <div class="text-center mb-4">
        <h1 class="font-weight-bold"><?php echo e($post->title); ?></h1>
    </div>

    <!-- Post Metadata -->
    <div class="text-muted mb-4">
        <p>By: <span class="font-weight-bold"><?php echo e($post->user->name); ?></span></p>
        <p>On: <span class="font-weight-bold"><?php echo e($post->updated_at->format('m-d-Y')); ?></span></p>
    </div>

    <!-- Post Image -->
    <div class="text-center mb-4">
        <img src="/images/<?php echo e($post->image_path); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid rounded">
    </div>

    <!-- Post Description -->
    <div class="mb-4">
        <p><?php echo e($post->description); ?></p>
    </div>

    <!-- Edit and Delete Post -->
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->id == $post->user_id): ?>
            <div class="mb-4">
                <a href="/blog/<?php echo e($post->slug); ?>/edit" class="btn btn-primary">Edit Post</a>

                <form action="/blog/<?php echo e($post->slug); ?>" method="post" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Comments Section -->
    <div class="mt-5">
        <h3 class="mb-3">Comments</h3>
        <div id="comments">
            <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-2 p-3">
                    <p><?php echo e($comment->content); ?></p>
                    <p class="text-muted">Author: <?php echo e($comment->user->name); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>No comments yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Comment Form -->
    <?php if(auth()->guard()->check()): ?>
        <div id="commentForm" class="mt-4">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">Type your comment here</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('comments.store', $post->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="5" placeholder="Type your comment here" required></textarea>
                        </div>
                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="mt-4">
            <p>Please <a href="<?php echo e(route('login')); ?>">log in</a> to comment.</p>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Blog\resources\views/blog/show.blade.php ENDPATH**/ ?>
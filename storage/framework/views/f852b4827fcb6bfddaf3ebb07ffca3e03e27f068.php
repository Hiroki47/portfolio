<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="row gx-5">
    <div class="col-8">
        <?php if($all_posts->isNotEmpty()): ?>
            <?php $__currentLoopData = $all_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($post->user->isFollowed() || $post->user->id === Auth::user()->id): ?>
                    <div class="card mb-4">
                        <?php echo $__env->make('users.posts.contents.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('users.posts.contents.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>                    
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <!-- If the site doesn't have any posts yet. -->
        <div class="text-center">
            <h2>Share Photos</h2>
            <p class="text-muted">When you share photos, they'll apper on your profile.</p>
            <a href="<?php echo e(route('post.create')); ?>" class="text-decoration-none">Share your first photo</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-4">
        <!-- Profile Overview -->
        <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
            <div class="col-auto">
                <a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>">
                <?php if(Auth::user()->avatar): ?>
                    <img src="<?php echo e(asset('storage/avatars/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->avatar); ?>" class="rounded-circle overview-avatar">
                <?php else: ?>
                    <i class="fa-solid fa-circle-user text-secondary overview-icon"></i>
                <?php endif; ?>
                </a>
            </div>
            <div class="col ps-0">
                <a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>" class="text-decoration-none text-dark fw-bold"><?php echo e(Auth::user()->name); ?></a>
                <p class="text-muted"><?php echo e(Auth::user()->email); ?></p>
            </div>
        </div>

        <!-- Suggestions -->
        <?php echo $__env->make('users.posts.contents.suggestions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/users/home.blade.php ENDPATH**/ ?>
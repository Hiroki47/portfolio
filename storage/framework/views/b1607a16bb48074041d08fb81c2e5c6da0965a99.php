<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('users.profile.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--  -->
<div style="margin-top: 100px">
    <?php if($user->posts->isNotEmpty()): ?>
        <div class="row">
            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 mb-4">
                    <a href="<?php echo e(route('post.show', $post->id)); ?>">
                        <img src="<?php echo e(asset('storage/images/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>" class="grid-img">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <h3 class="text-muted text-center">No posts yet.</h3>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<!-- Add more  -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/users/profile/show.blade.php ENDPATH**/ ?>
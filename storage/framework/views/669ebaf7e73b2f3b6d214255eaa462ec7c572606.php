<?php $__env->startSection('title', 'Suggestions For You'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-5">
            
            <p class="fw-bold">Suggested</p>
        
            <?php $__currentLoopData = $suggested_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row align-items-center mt-3">
                <div class="col-auto">
                    <a href="<?php echo e(route('profile.show', $user->id)); ?>">
                        <?php if($user->avatar): ?>
                            <img src="<?php echo e(asset('/storage/avatars/' . $user->avatar)); ?>" alt="<?php echo e($user->avatar); ?>" class="rounded-circle suggested-avatar">
                        <?php else: ?>
                            <i class="fa-solid fa-circle-user text-secondary suggested-icon"></i>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col ps-0 text-truncate">
                    <a href="<?php echo e(route('profile.show', $user->id)); ?>" class="text-decoration-none text-dark fw-bold"><?php echo e($user->name); ?></a>
                    
                    <p class="text-muted mb-0"><?php echo e($user->email); ?></p>
                    <?php if($user->isFollowingMe()): ?>
                        <p class="text-muted mb-0 small">Follows you</p>                 
                    <?php else: ?>
                        <?php if($user->followers->count() == 0): ?>
                            <p class="text-muted mb-0 small">No followers yet</p>
                        <?php else: ?>
                            <p class="text-muted mb-0 small">Followed by <?php echo e($user->followers->count()); ?> <?php echo e($user->followers->count() == 1 ? 'user' : 'users'); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-auto align-self-center">
                    <form action="<?php echo e(route('follow.store', $user->id)); ?>" method="post" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/users/suggested.blade.php ENDPATH**/ ?>
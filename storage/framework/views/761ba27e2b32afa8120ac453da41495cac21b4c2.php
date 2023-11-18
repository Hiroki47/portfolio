<?php if($suggested_users): ?>
    <div class="row">
        <div class="col-auto">
            <p class="fw-bold text-secondary">Suggestions For You</p>
        </div>
        <div class="col text-end">
            <a href="<?php echo e(route('suggested')); ?>" class="text-decoration-none text-dark fw-bold small">See all</a>
        </div>
    </div>

    <?php $__currentLoopData = array_slice($suggested_users, 0, 10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row align-items-center mt-3">
        <div class="col-auto">
            <a href="<?php echo e(route('profile.show', $user->id)); ?>">
                <?php if($user->avatar): ?>
                    <img src="<?php echo e(asset('/storage/avatars/' . $user->avatar)); ?>" alt="<?php echo e($user->avatar); ?>" class="rounded-circle user-avatar">
                <?php else: ?>
                    <i class="fa-solid fa-circle-user text-secondary user-icon"></i>
                <?php endif; ?>
            </a>
        </div>
        <div class="col ps-0 text-truncate">
            <a href="<?php echo e(route('profile.show', $user->id)); ?>" class="text-decoration-none text-dark fw-bold small"><?php echo e($user->name); ?></a>
        </div>
        <div class="col-auto">
            <form action="<?php echo e(route('follow.store', $user->id)); ?>" method="post" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="border-0 bg-transparent p-0 text-primary btn-sm">Follow</button>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /work/resources/views/users/posts/contents/suggestions.blade.php ENDPATH**/ ?>
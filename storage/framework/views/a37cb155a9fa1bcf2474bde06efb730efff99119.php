<!-- Clickable image -->
<div class="container p-0">
    <a href="<?php echo e(route('post.show', $post->id)); ?>">
        <img src="<?php echo e(asset('/storage/images/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>" class="w-100">
    </a>
</div>
<div class="card-body">
    <!-- heart button + no. of likes + categories -->
    <div class="row align-items-center">
        <div class="col-auto">
            <?php if($post->isLiked()): ?>
                <form action="<?php echo e(route('like.destroy', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm shadow-none ps-0"><i class="fa-solid fa-heart text-danger"></i></button>
                    <span><?php echo e($post->likes->count()); ?></span>
                </form>
            <?php else: ?>
                <form action="<?php echo e(route('like.store', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-sm shadow-none ps-0"><i class="fa-regular fa-heart"></i></button>
                    <span><?php echo e($post->likes->count()); ?></span>
                </form>
            <?php endif; ?>
        </div>
        <div class="col text-end">
            <?php if($post->categoryPost->count() == 0): ?>
                <div class="badge bg-dark">Uncategorized</div>
            <?php endif; ?>
            <?php $__currentLoopData = $post->categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="badge bg-secondary bg-opacity-50">
                <?php echo e($category_post->category->name); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- owner + description -->
    <a href="<?php echo e(route('profile.show', $post->user->id)); ?>" class="text-decoration-none text-dark fw-bold"><?php echo e($post->user->name); ?></a>
    &nbsp;
    <p class="d-inline fw-light"><?php echo e($post->description); ?></p>

    <!-- Include comments here -->
    <?php echo $__env->make('users.posts.contents.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /work/resources/views/users/posts/contents/body.blade.php ENDPATH**/ ?>
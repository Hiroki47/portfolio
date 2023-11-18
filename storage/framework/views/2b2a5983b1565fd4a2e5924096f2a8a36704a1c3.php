<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <a href="<?php echo e(route('profile.show', $post->user->id)); ?>">
                <?php if($post->user->avatar): ?>
                <img src="<?php echo e(asset('storage/avatars/' . $post->user->avatar)); ?>" alt="<?php echo e($post->user->avatar); ?>" class="rounded-circle user-avatar">
                <?php else: ?>
                <i class="fa-solid fa-circle-user text-secondary user-icon"></i>
                <?php endif; ?>
            </a>
        </div>
        <div class="col ps-0">
            <a href="<?php echo e(route('profile.show', $post->user->id)); ?>" class="text-decoration-none text-dark"><?php echo e($post->user->name); ?></a>
        </div>
        <div class="col-auto text-end">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>

                <!-- If you are the owner of the post, you can Edit or Delete this post -->
                <?php if(Auth::user()->id === $post->user->id): ?>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="dropdown-item">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                    </a>
                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-<?php echo e($post->id); ?>">
                        <i class="fa-regular fa-trash-can"></i> Delete
                    </button>
                </div>
                <?php else: ?>
                <!-- If you are not the owner of the post, show an Unfollow button. To be disscussed soon. -->
                <div class="dropdown-menu">
                    <form action="<?php echo e(route('follow.destroy', $post->user->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="dropdown-item text-danger">Unfollow</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php if(Auth::user()->id === $post->user->id): ?>
<div class="modal fade" id="delete-post-<?php echo e($post->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger"><i class="fa-solid fa-circle-exclamation"></i> Delete Post</h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post?</p>
                <div class="mt-3">
                    <img src="<?php echo e(asset('/storage/images/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>" class="delete-post-img">
                    <p class="mt-1 text-muted"><?php echo e($post->description); ?></p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="<?php echo e(route('post.destroy', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /work/resources/views/users/posts/contents/title.blade.php ENDPATH**/ ?>
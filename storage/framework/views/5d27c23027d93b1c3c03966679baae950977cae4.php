<?php $__env->startSection('title', 'Admin: Posts'); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-primary text-secondary">
            <tr>
                <th></th>
                <th></th>
                <th>CATEGORY</th>
                <th>OWNER</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($all_posts->isNotEmpty()): ?>
                <?php $__currentLoopData = $all_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($post->id); ?></td>
                        <td>
                            <a href="<?php echo e(route('post.show', $post->id)); ?>">
                                <img src="<?php echo e(asset('storage/images/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>" class="d-block mx-auto admin-posts-image">
                            </a>
                        </td>
                        <td>
                            <?php if($post->categoryPost->count() == 0): ?>
                                <div class="badge bg-dark">Uncategorized</div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $post->categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="badge bg-secondary bg-opacity-50">
                                    <?php echo e($category_post->category->name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><a href="<?php echo e(route('profile.show', $post->user->id)); ?>" class="text-decoration-none text-secondary"><?php echo e($post->user->name); ?></a></td>
                        <td><?php echo e($post->created_at); ?></td>
                        <td>
                            <?php if($post->trashed()): ?>
                                <i class="fa-solid fa-circle-minus text-secondary"></i>&nbsp; Hidden
                            <?php else: ?>
                                <i class="fa-solid fa-circle text-primary"></i>&nbsp; Visible
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <?php if($post->trashed()): ?>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-post-<?php echo e($post->id); ?>">
                                            <i class="fa-solid fa-eye"></i> Unhide Post No.<?php echo e($post->id); ?>

                                        </button>
                                    </div>
                                <?php else: ?>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-<?php echo e($post->id); ?>">
                                            <i class="fa-solid fa-eye-slash"></i> Hide Post No.<?php echo e($post->id); ?>

                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php echo $__env->make('admin.posts.modal.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="lead text-muted text-center">No posts yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php echo e($all_posts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>
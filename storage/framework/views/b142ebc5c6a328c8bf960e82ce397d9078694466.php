<?php $__env->startSection('title', 'Admin: Users'); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <tr>
                <th></th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php if($user->avatar): ?>
                            <img src="<?php echo e(asset('storage/avatars/' . $user->avatar)); ?>" alt="<?php echo e($user->avatar); ?>" class="rounded-circle d-block mx-auto admin-users-avatar">
                        <?php else: ?>
                            <i class="fa-solid fa-circle-user d-block text-center admin-users-icon"></i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('profile.show', $user->id)); ?>" class="text-decoration-none text-dark fw-bold"><?php echo e($user->name); ?></a>
                    </td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                    <td>
                        <?php if($user->trashed()): ?>
                            <i class="fa-regular fa-circle text-secondary"></i>&nbsp; Inactive
                        <?php else: ?>
                            <i class="fa-solid fa-circle text-success"></i>&nbsp; Active
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(Auth::user()->id != $user->id): ?>
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <?php if($user->trashed()): ?>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#activate-user-<?php echo e($user->id); ?>">
                                            <i class="fa-solid fa-user-check"></i> Activate <?php echo e($user->name); ?>

                                        </button>
                                    </div>
                                <?php else: ?>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-<?php echo e($user->id); ?>">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate <?php echo e($user->name); ?>

                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php echo $__env->make('admin.users.modal.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($all_users->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/admin/users/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="<?php echo e(route('profile.update')); ?>" method="post" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>

                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>

                <div class="row mb-3">
                    <div class="col-4">
                        <?php if($user->avatar): ?>
                            <img src="<?php echo e(asset('storage/avatars/' . $user->avatar)); ?>" alt="<?php echo e($user->avatar); ?>" class="img-thumbnail rounded-circle d-block mx-auto profile-avatar">
                        <?php else: ?>
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto align-self-end">
                        <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                        <div id="avatar-info" class="form-text">
                            Acceptable formats: jpeg, jpg, png, gif only<br>
                            Max file size is 1048kB
                        </div>
                        <!-- Error -->
                        <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger small"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', $user->name)); ?>" autofocus>
                        <!-- Error -->
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger small"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label type="email" class="form-label fw-bold">E-Mail Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>">
                        <!-- Error -->
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger small"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label for="introduction" class="form-label fw-bold">Introduction</label>
                    <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Describe yourself"><?php echo e(old('introduction', $user->introduction)); ?></textarea>
                        <!-- Error -->
                        <?php $__errorArgs = ['introduction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger small"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-warning px-5">Save</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/users/profile/edit.blade.php ENDPATH**/ ?>
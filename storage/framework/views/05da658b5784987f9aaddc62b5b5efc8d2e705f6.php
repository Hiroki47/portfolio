<?php $__env->startSection('title', 'Create Post'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <!-- cross-site request forgeries -->
    <div class="mb-3">
        <label for="category" class="form-label d-block fw-bold">Category
            <span class="text-muted fw-normal">(up to 3)</span>
        </label>
        <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="category[]" value="<?php echo e($category->id); ?>" id="<?php echo e($category->name); ?>" class="form-check-input">
            <label for="<?php echo e($category->name); ?>" class="form-check-label"><?php echo e($category->name); ?></label>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Error -->
        <?php $__errorArgs = ['category'];
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
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="What's on your mind"><?php echo e(old('description')); ?></textarea>
        <!-- Error -->
        <?php $__errorArgs = ['description'];
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
    <div class="mb-4">
        <label for="image" class="form-label fw-bold">Image</label>
        <input type="file" name="image" class="form-control" aria-describedby="image-info">
        <div id="image-info" class="form-text">
            Acceptable formats: jpeg, jpg, png, gif only<br>
            Max file size is 1048kB
        </div>
        <!-- Error -->
        <?php $__errorArgs = ['image'];
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
    <button type="submit" class="btn btn-primary px-5">Post</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/users/posts/create.blade.php ENDPATH**/ ?>
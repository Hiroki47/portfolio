<?php $__env->startSection('title', 'Admin: Categories'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('admin.categories.store')); ?>" method="post" class="mb-4">
        <?php echo csrf_field(); ?>

        <div class="row gx-2">
            <div class="col-4">
                <input type="text" name="name" class="form-control" placeholder="Add a category..." autofocus>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
            
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
    </form>

    <div class="row">
        <div class="col-8">
            <table class="table table-hover align-middle bg-white border table-sm text-secondary text-center">
                <thead class="table-warning small text-secondary">
                    <th>#</th>
                    <th>NAME</th>
                    <th>COUNT</th>
                    <th>LAST UPDATED</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($category->id); ?></td>
                            <td class="text-dark"><?php echo e($category->name); ?></td>
                            <td><?php echo e($category->categoryPost->count()); ?></td>
                            <td><?php echo e($category->updated_at); ?></td>
                            <td>
                                
                                <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-category-<?php echo e($category->id); ?>" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                
                                <button class="btn btn-outline-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#delete-category-<?php echo e($category->id); ?>" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    <?php echo $__env->make('admin.categories.modal.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td class="text-dark">Uncategorized</td>
                        <td><?php echo e($uncategorized_count); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>
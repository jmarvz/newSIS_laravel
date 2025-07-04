<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 2px solid #259747;">
                <div class="card-header" style="background: #259747; color: white; font-weight: 600;">
                    <?php echo e(__('Add Faculty Member')); ?>

                </div>
                <div class="card-body" style="background: #f0f9f4;">
                    <form method="POST" action="<?php echo e(route('admin.faculty-management.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" style="background: #259747; color: white; border: none;">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger" style="background: #dc3545; color: white; border: none;">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="form-group" style="margin-bottom: 25px;">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Name')); ?></label>
                            <div class="col-md-6">
                                <a href="<?php echo e(route('admin.faculty-management.index')); ?>" class="btn-audit" style="background: #259747; color: white;">
                                    <span class="badge" style="background: white; color: #259747;">←</span>
                                    Back
                                </a>
                            </div>
                        </div>

    <main class="dash-main">
        <div class="card">
            <form action="<?php echo e(route('admin.faculty-management.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" required class="form-control">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" required class="form-control">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label for="password" style="color: #259747; font-weight: 500;">Password</label>
                    <input type="password" name="password" id="password" required class="form-control" style="border: 1px solid #259747;">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label for="password_confirmation" style="color: #259747; font-weight: 500;">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control" style="border: 1px solid #259747;">
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label for="department" style="color: #259747; font-weight: 500;">Department</label>
                    <select name="department" id="department" class="form-control" style="border: 1px solid #259747;" required>
                        <option value="">Select Department</option>
                        <option value="IT">Information Technology</option>
                        <option value="HRS">Human Resource Services</option>
                        <option value="BOTH">Both Departments</option>
                    </select>
                    <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="text-align: center; margin-top: 30px;">
                    <button type="submit" class="btn-audit" style="background: #259747; color: white; padding: 12px 30px; font-weight: 500;">
                        <span class="badge" style="background: white; color: #259747;">+</span>
                        Add Faculty Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/faculty-management/create.blade.php ENDPATH**/ ?>
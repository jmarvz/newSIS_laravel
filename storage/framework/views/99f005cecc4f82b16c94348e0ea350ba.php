<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 2px solid #259747;">
                <div class="card-header" style="background: #259747; color: white; font-weight: 600;">
                    <?php echo e(__('Edit Faculty Member')); ?>

                </div>
                <div class="card-body" style="background: #f0f9f4;">
                    <form method="POST" action="<?php echo e(route('admin.faculty-management.update', $faculty->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
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

                        <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Name')); ?></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $faculty->name)); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Email Address')); ?></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email', $faculty->email)); ?>" required autocomplete="email">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Password')); ?></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Leave blank to keep current password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Confirm Password')); ?></label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="department" class="col-md-4 col-form-label text-md-right" style="color: #259747; font-weight: 500;"><?php echo e(__('Department')); ?></label>
                            <div class="col-md-6">
                                <select id="department" class="form-control <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="IT" <?php echo e($faculty->department === 'IT' ? 'selected' : ''); ?>>Information Technology</option>
                                    <option value="HRS" <?php echo e($faculty->department === 'HRS' ? 'selected' : ''); ?>>Human Resource Services</option>
                                    <option value="BOTH" <?php echo e($faculty->department === 'BOTH' ? 'selected' : ''); ?>>Both Departments</option>
                                </select>
                                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.85rem;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group" style="text-align: center; margin-top: 30px;">
                            <button type="submit" class="btn-audit" style="background: #259747; color: white; padding: 12px 30px; font-weight: 500;">
                                <span class="badge" style="background: white; color: #259747;">✓</span>
                                Update Faculty Member
                            </button>
                            <a href="<?php echo e(route('admin.faculty-management.index')); ?>" class="btn-audit" style="background: #259747; color: white; margin-left: 10px; padding: 12px 30px; font-weight: 500;">
                                <span class="badge" style="background: white; color: #259747;">←</span>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/faculty-management/edit.blade.php ENDPATH**/ ?>
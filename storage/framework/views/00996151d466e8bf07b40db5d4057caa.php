<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SIS – Forgot Password</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
</head>
<body>
<div class="container">
    <div class="form-panel">
        <h1 class="main-title">Student Information System</h1>
        <div class="toggle-btns">
            <a href="<?php echo e(route('login')); ?>" class="toggle-btn">Back to Login</a>
        </div>

        <form class="form" method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>
            
            <h2>Forgot Password</h2>
            
            <?php if(session('message')): ?>
                <div class="message success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required />
            </div>

            <button type="submit" class="btn">Send Verification Code</button>
        </form>
    </div>
</div>
</body>

<script>
    <?php if($errors->any()): ?>
        let errorMessage = '';
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            errorMessage += '<?php echo e($error); ?>\n';
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        alert(errorMessage);
    <?php endif; ?>
</script>

</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>
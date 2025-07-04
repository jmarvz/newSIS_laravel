<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code - Password Reset</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .verify-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .verify-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <h2>Enter Verification Code</h2>
        
        <?php if(session('message')): ?>
            <div class="message success">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="message error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.verify.code')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="email" value="<?php echo e($email); ?>">
            
            <div class="input-group">
                <label for="code">Verification Code</label>
                <input type="text" id="code" name="code" required maxlength="6">
            </div>

            <button type="submit" class="btn">Verify Code</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/auth/verify-code.blade.php ENDPATH**/ ?>
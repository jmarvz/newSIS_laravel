<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Send Message - SIS</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
</head>
<body>
    <div class="dash-header">
        <div style="display: flex; gap: 10px; align-items: center; justify-content: space-between;">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                < Back to Dashboard
            </a>
            <h1>Send Message</h1>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <main class="dash-main">
        <section class="message-form card">
            <?php if(session('success')): ?>
                <div class="alert alert-success" style="background: #f0fff0; color: #259747; border: 1px solid #259747; border-radius: 4px; padding: 10px; margin-bottom: 20px;">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('messages.store')); ?>" style="width: 100%;">
                <?php echo csrf_field(); ?>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="recipient_type" style="display: block; margin-bottom: 5px; color: #333;">Recipient</label>
                    <select id="recipient_type" name="recipient_type" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="faculty">Faculty (for grade concerns)</option>
                        <option value="admin">Admin (for information concerns)</option>
                    </select>
                    <?php $__errorArgs = ['recipient_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: #dc3545; font-size: 0.875em; margin-top: 0.25rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="message_type" style="display: block; margin-bottom: 5px; color: #333;">Message Type</label>
                    <select id="message_type" name="message_type" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="grade">Grade Concern</option>
                        <option value="info">Information Concern</option>
                    </select>
                    <?php $__errorArgs = ['message_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: #dc3545; font-size: 0.875em; margin-top: 0.25rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="content" style="display: block; margin-bottom: 5px; color: #333;">Message Content</label>
                    <textarea id="content" name="content" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; height: 200px;"></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: #dc3545; font-size: 0.875em; margin-top: 0.25rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn-audit" style="background: #259747; color: white; padding: 12px 24px; border-radius: 4px; width: 100%;">
                    Send Message
                </button>
            </form>
        </section>
    </main>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/messages/create.blade.php ENDPATH**/ ?>
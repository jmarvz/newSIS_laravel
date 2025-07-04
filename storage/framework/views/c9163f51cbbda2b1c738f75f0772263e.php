<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Messages - SIS</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
</head>
<body>
    <div class="dash-header">
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="<?php echo e(App\Helpers\UrlHelper::getFacultyDashboardUrl()); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Back to Dashboard</a>
            <?php if(auth()->user()->role === 'student'): ?>
                <a href="<?php echo e(route('messages.create')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Send New Message</a>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <main class="dash-main">
        <section class="messages-list card">
            <h2 class="section-title">My Messages</h2>
            <?php if(session('status')): ?>
                <div class="alert alert-success" style="background: #f0fff0; color: #259747; border: 1px solid #259747; border-radius: 4px; padding: 10px; margin-bottom: 20px;">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <?php if($unreadCount > 0): ?>
                <div class="alert alert-info" style="background: #f0fff0; color: #259747; border: 1px solid #259747; border-radius: 4px; padding: 10px; margin-bottom: 20px;">
                    You have <?php echo e($unreadCount); ?> unread message<?php echo e($unreadCount > 1 ? 's' : ''); ?>.
                </div>
            <?php endif; ?>

            <?php if($messages->isEmpty()): ?>
                <p class="text-center" style="color: #666; padding: 20px;">No messages found.</p>
            <?php else: ?>
                <div class="messages-grid">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="message-card" style="border: 1px solid #259747; border-radius: 8px; margin-bottom: 20px; background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <div class="message-header" style="padding: 15px; border-bottom: 1px solid #259747;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h3 style="margin: 0; color: #259747; font-size: 1.2rem;">
                                        <?php if(Auth::user()->role === 'faculty'): ?>
                                            <?php echo e($message->sender->name); ?> (Student)
                                        <?php else: ?>
                                            <?php echo e($message->sender->name); ?> (<?php echo e($message->sender->role === 'faculty' ? 'Faculty' : 'Student'); ?>)
                                        <?php endif; ?>
                                    </h3>
                                    <small style="color: #666;"><?php echo e($message->created_at->format('M d, Y')); ?></small>
                                </div>
                            </div>
                            
                            <div class="message-content" style="padding: 15px;">
                                <div class="message-text" style="margin-bottom: 10px;">
                                    <p style="margin: 0;"><?php echo e(Str::limit($message->content, 150)); ?></p>
                                </div>
                                
                                <div class="message-meta" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                    <?php if(Auth::user()->role === 'faculty'): ?>
                                        <span class="badge" style="background: #259747; color: white; padding: 4px 8px; border-radius: 4px;">
                                            <?php echo e($message->message_type === 'grade' ? 'Grade Concern' : 'Other'); ?>

                                        </span>
                                    <?php elseif(Auth::user()->role === 'admin'): ?>
                                        <span class="badge" style="background: #259747; color: white; padding: 4px 8px; border-radius: 4px;">
                                            <?php echo e($message->message_type === 'info' ? 'Info Concern' : 'Other'); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(!$message->is_read): ?>
                                        <span class="badge" style="background: #259747; color: white; padding: 4px 8px; border-radius: 4px;">
                                            Unread
                                        </span>
                                    <?php endif; ?>
                                    <?php if($message->status): ?>
                                        <span class="badge" style="background: <?php echo e($message->status === 'pending' ? '#ff9800' : '#4caf50'); ?>; color: white; padding: 4px 8px; border-radius: 4px;">
                                            <?php echo e($message->status === 'pending' ? 'Pending' : 'Completed'); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <?php if($message->response): ?>
                                <div class="response-box" style="padding: 15px; border-top: 1px solid #259747;">
                                    <h4 style="color: #259747; margin: 0 0 10px 0; font-size: 1.1rem;">Response:</h4>
                                    <p style="margin: 0;"><?php echo e($message->response); ?></p>
                                </div>
                            <?php endif; ?>
                            
                            <div class="message-footer" style="padding: 15px; border-top: 1px solid #259747; text-align: right;">
                                <a href="<?php echo e(route('messages.show', $message->id)); ?>" class="view-message" style="color: #259747; text-decoration: none; font-weight: 600;">
                                    View Full Message →
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/messages/index.blade.php ENDPATH**/ ?>
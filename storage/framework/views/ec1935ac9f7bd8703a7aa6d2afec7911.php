<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Message Details</title>
  <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
  <style>
    .card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 20px;
      margin: 20px;
    }
    .card-header {
      background: #259747;
      color: white;
      padding: 15px;
      border-radius: 8px 8px 0 0;
    }
    .card-header h2 {
      margin: 0;
      font-size: 1.25rem;
    }
    .message-content {
      margin: 20px 0;
      padding: 15px;
      background: #f8f9fa;
      border-radius: 6px;
    }
    .status-badge {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 15px;
      font-size: 0.9rem;
      font-weight: 500;
    }
    .status-pending {
      background: #ffc107;
      color: #000;
    }
    .status-done {
      background: #28a745;
      color: white;
    }
    .btn-audit {
      background: #259747;
      color: white;
      padding: 12px 24px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.2s ease;
    }
    .btn-audit:hover {
      background: #1a7a37;
      transform: translateY(-1px);
    }
    .form-control {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 15px;
    }
    .form-select {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 6px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
    <div class="dash-header">
        <div style="display: flex; gap: 10px; align-items: center; justify-content: space-between;">
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="<?php echo e(App\Helpers\UrlHelper::getFacultyDashboardUrl()); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    < Back to Dashboard
                </a>
                <h1>Message Details</h1>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <main class="dash-main">
        <div class="card">
            <div class="card-header">
                <h2>Message Details</h2>
            </div>

            <div class="card-body">
                <div class="message-content">
                    <div class="mb-4">
                        <strong>Sender:</strong> <?php echo e($message->sender->name); ?>

                    </div>
                    
                    <div class="mb-4">
                        <strong>Type:</strong> <?php echo e(ucfirst($message->type)); ?>

                    </div>
                    
                    <div class="mb-4">
                        <strong>Content:</strong>
                        <p><?php echo e($message->content); ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <strong>Status:</strong> 
                        <span class="status-badge <?php echo e($message->status === 'pending' ? 'status-pending' : 'status-done'); ?>">
                            <?php echo e(ucfirst($message->status)); ?>

                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <strong>Sent At:</strong> <?php echo e($message->created_at->format('F j, Y, g:i a')); ?>

                    </div>
                    
                    <?php if($message->response): ?>
                        <div class="mb-4">
                            <strong>Response:</strong>
                            <p><?php echo e($message->response); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if(auth()->user()->role !== 'student'): ?>
                    <div class="mt-4">
                        <form action="<?php echo e(route('messages.updateStatus', $message->id)); ?>" method="POST" class="d-flex gap-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" class="form-select" required>
                                <option value="pending" <?php echo e($message->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="done" <?php echo e($message->status === 'done' ? 'selected' : ''); ?>>Done</option>
                            </select>
                            <input type="text" name="response" class="form-control" placeholder="Add response...">
                            <button type="submit" class="btn-audit">Update Status</button>
                        </form>
                    </div>
                <?php endif; ?>

                <div class="mt-4">
                    <a href="<?php echo e(route('messages.index')); ?>" class="btn-audit">Back to Inbox</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/messages/show.blade.php ENDPATH**/ ?>
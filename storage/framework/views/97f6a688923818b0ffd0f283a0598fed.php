<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Schedule</title>

    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        .schedule-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .filter-info {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .filter-info p {
            margin: 5px 0;
            color: #333;
            font-size: 1.1em;
        }
        .filter-info strong {
            color: #259747;
        }
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .schedule-table th {
            background: #259747;
            color: #fff;
            padding: 15px;
            text-align: left;
        }
        .schedule-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        .schedule-table tr:hover {
            background: #f5f5f5;
        }
        .back-btn {
            background: #259747;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            font-size: 1em;
        }
        .back-btn:hover {
            background: #1e7e34;
        }
        .btn-action {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 0 2px;
            cursor: pointer;
            border: none;
            color: white;
            font-size: 0.9em;
        }
        .btn-edit {
            background-color: #ffc107;
        }
        .btn-update {
            background-color: #0d6efd;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-action:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="schedule-container">
        <?php if(session('success')): ?>
            <div class="success-message">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <button onclick="window.close()" class="back-btn">&larr; Back to Dashboard</button>

        <div class="filter-info">
            <h2>Class Schedule</h2>
            <p><strong>Course:</strong> <?php echo e(request('course')); ?></p>
            <p><strong>Year Level:</strong> <?php echo e(request('year')); ?></p>
            <p><strong>Section:</strong> <?php echo e(request('section')); ?></p>
            <p><strong>Term:</strong> <?php echo e(request('term')); ?></p>
        </div>

        <?php if(auth()->user()->role === 'admin'): ?>
            <div style="text-align: center; margin: 20px 0;">
                <a href="<?php echo e(route('schedule.create', ['course' => request('course'), 'year' => request('year'), 'section' => request('section'), 'term' => request('term')])); ?>" class="btn-action btn-update">Create New Schedule</a>
            </div>
        <?php endif; ?>


        
        <table class="schedule-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Instructor</th>
                    <th>Day</th>
                    <th>Time</th>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($schedule->subject); ?></td>
                        <td><?php echo e($schedule->instructor); ?></td>
                        <td><?php echo e($schedule->day); ?></td>
                        <td><?php echo e($schedule->start_time); ?> - <?php echo e($schedule->end_time); ?></td>
                        <?php if(auth()->user()->role === 'admin'): ?>
                            <td>
                                <a href="<?php echo e(route('schedule.edit', ['schedule' => $schedule->id])); ?>" class="btn-action btn-edit">Edit</a>
                                <form action="<?php echo e(route('schedule.destroy', ['schedule' => $schedule->id])); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="<?php echo e(auth()->user()->role === 'admin' ? '5' : '4'); ?>" style="text-align: center;">No schedule found for the selected filters.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/schedule.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .schedule-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn-action {
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 0 5px;
            cursor: pointer;
            border: none;
            color: white;
            font-size: 1em;
        }
        .btn-save {
            background-color: #259747;
        }
        .btn-cancel {
            background-color: #6c757d;
        }
        .btn-action:hover {
            opacity: 0.9;
        }
        .error {
            color: #dc3545;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="schedule-container">
        <button onclick="window.close()" class="btn-action btn-cancel">&larr; Back to Schedule</button>
        
        <div class="form-container">
            <h2>Create New Schedule</h2>
            
            <div class="filter-info" style="margin-bottom: 20px;">
                <h3>Current Filter Settings</h3>
                <p>You are creating a schedule for the following group:</p>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><span style="font-weight: bold;">Course:</span> <?php echo e(request('course')); ?></li>
                    <li><span style="font-weight: bold;">Year Level:</span> <?php echo e(request('year')); ?></li>
                    <li><span style="font-weight: bold;">Section:</span> <?php echo e(request('section')); ?></li>
                    <li><span style="font-weight: bold;">Term:</span> <?php echo e(request('term')); ?></li>
                </ul>
            </div>
            
            <form action="<?php echo e(route('schedule.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <!-- Hidden fields for filter values -->
                <input type="hidden" name="course" value="<?php echo e(request('course')); ?>">
                <input type="hidden" name="year" value="<?php echo e(request('year')); ?>">
                <input type="hidden" name="section" value="<?php echo e(request('section')); ?>">
                <input type="hidden" name="term" value="<?php echo e(request('term')); ?>">

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="instructor">Instructor</label>
                    <input type="text" id="instructor" name="instructor" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="day">Day</label>
                    <select id="day" name="day" required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" id="start_time" name="start_time" required>
                </div>
                
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" id="end_time" name="end_time" required>
                </div>

                <?php if($errors->any()): ?>
                    <div class="error">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <div style="text-align: right;">
                    <button type="submit" class="btn-action btn-save">Save Schedule</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/schedule/create.blade.php ENDPATH**/ ?>
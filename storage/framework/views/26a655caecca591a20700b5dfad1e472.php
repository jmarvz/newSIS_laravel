<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .edit-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-action {
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            cursor: pointer;
            border: none;
            color: white;
            font-size: 1em;
        }
        .btn-update {
            background-color: #0d6efd;
        }
        .btn-cancel {
            background-color: #6c757d;
        }
        .btn-action:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2>Edit Schedule</h2>
        
        <form method="POST" action="<?php echo e(route('schedule.update', ['schedule' => $schedule->id])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <!-- Hidden fields for filter values -->
            <input type="hidden" name="course" value="<?php echo e(request()->query('course')); ?>">
            <input type="hidden" name="year" value="<?php echo e(request()->query('year')); ?>">
            <input type="hidden" name="section" value="<?php echo e(request()->query('section')); ?>">
            <input type="hidden" name="term" value="<?php echo e(request()->query('term')); ?>">
            
            <div class="form-group">
                <label>Course</label>
                <select name="course" required>
                    <option value="IT" <?php echo e($schedule->course === 'IT' ? 'selected' : ''); ?>>IT</option>
                    <option value="HRS" <?php echo e($schedule->course === 'HRS' ? 'selected' : ''); ?>>HRS</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Year Level</label>
                <select name="year" required>
                    <option value="1st Year" <?php echo e($schedule->year === '1st Year' ? 'selected' : ''); ?>>1st Year</option>
                    <option value="2nd Year" <?php echo e($schedule->year === '2nd Year' ? 'selected' : ''); ?>>2nd Year</option>
                    <option value="3rd Year" <?php echo e($schedule->year === '3rd Year' ? 'selected' : ''); ?>>3rd Year</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Section</label>
                <select name="section" required>
                    <option value="AM" <?php echo e($schedule->section === 'AM' ? 'selected' : ''); ?>>AM</option>
                    <option value="PM" <?php echo e($schedule->section === 'PM' ? 'selected' : ''); ?>>PM</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Term</label>
                <select name="term" required>
                    <option value="1st" <?php echo e($schedule->term === '1st' ? 'selected' : ''); ?>>1st Term</option>
                    <option value="2nd" <?php echo e($schedule->term === '2nd' ? 'selected' : ''); ?>>2nd Term</option>
                    <option value="3rd" <?php echo e($schedule->term === '3rd' ? 'selected' : ''); ?>>3rd Term</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" value="<?php echo e($schedule->subject); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Instructor</label>
                <input type="text" name="instructor" value="<?php echo e($schedule->instructor); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Day</label>
                <select name="day" required>
                    <option value="Monday" <?php echo e($schedule->day === 'Monday' ? 'selected' : ''); ?>>Monday</option>
                    <option value="Tuesday" <?php echo e($schedule->day === 'Tuesday' ? 'selected' : ''); ?>>Tuesday</option>
                    <option value="Wednesday" <?php echo e($schedule->day === 'Wednesday' ? 'selected' : ''); ?>>Wednesday</option>
                    <option value="Thursday" <?php echo e($schedule->day === 'Thursday' ? 'selected' : ''); ?>>Thursday</option>
                    <option value="Friday" <?php echo e($schedule->day === 'Friday' ? 'selected' : ''); ?>>Friday</option>
                    <option value="Saturday" <?php echo e($schedule->day === 'Saturday' ? 'selected' : ''); ?>>Saturday</option>
                    <option value="Sunday" <?php echo e($schedule->day === 'Sunday' ? 'selected' : ''); ?>>Sunday</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Start Time</label>
                <input type="time" name="start_time" value="<?php echo e(substr($schedule->time, 0, 5)); ?>" required>
            </div>

            <div class="form-group">
                <label>End Time</label>
                <input type="time" name="end_time" value="<?php echo e(substr($schedule->time, 8, 5)); ?>" required>
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="<?php echo e(route('schedule', request()->query())); ?>" class="btn-action btn-cancel">Cancel</a>
                <button type="submit" class="btn-action btn-update">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/schedule/edit.blade.php ENDPATH**/ ?>
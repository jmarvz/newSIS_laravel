<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List - Faculty</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .students-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .students-table th, .students-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .students-table th {
            background-color: #259747;
            color: white;
            font-weight: bold;
        }
        .students-table tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            cursor: pointer;
            border: none;
            font-size: 14px;
        }
        .btn-view {
            background-color: #0275d8;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .header-actions {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sort-header {
            cursor: pointer;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .sort-header:hover {
            color: #e0e0e0;
        }
        .sort-icon {
            font-size: 0.8em;
        }
        .current-sort {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-actions">
            <div>
                <button onclick="window.close()" class="btn btn-secondary">← Back to Dashboard</button>
                <h1 style="margin-top: 15px;">Students List</h1>
            </div>
        </div>

        <table class="students-table">
            <thead>
                <tr>
                    <th>
                        <a href="<?php echo e(route('faculty.students.index', ['sort' => 'student_id', 'direction' => $sortField === 'student_id' && $sortDirection === 'asc' ? 'desc' : 'asc'])); ?>" class="sort-header <?php echo e($sortField === 'student_id' ? 'current-sort' : ''); ?>">
                            Student ID
                            <?php if($sortField === 'student_id'): ?>
                                <span class="sort-icon"><?php echo e($sortDirection === 'asc' ? '↑' : '↓'); ?></span>
                            <?php endif; ?>
                        </a>
                    </th>
                    <th>
                        <a href="<?php echo e(route('faculty.students.index', ['sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc'])); ?>" class="sort-header <?php echo e($sortField === 'name' ? 'current-sort' : ''); ?>">
                            Name
                            <?php if($sortField === 'name'): ?>
                                <span class="sort-icon"><?php echo e($sortDirection === 'asc' ? '↑' : '↓'); ?></span>
                            <?php endif; ?>
                        </a>
                    </th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($student->student_id); ?></td>
                        <td><?php echo e($student->name); ?></td>
                        <td><?php echo e($student->email); ?></td>
                        <td><?php echo e($student->course); ?></td>
                        <td><?php echo e($student->year); ?></td>
                        <td><?php echo e($student->section); ?></td>
                        <td>
                            <a href="<?php echo e(route('faculty.students.grades', $student->id)); ?>" class="btn btn-view">View Grades</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No students found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html> <?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/faculty/students/index.blade.php ENDPATH**/ ?>
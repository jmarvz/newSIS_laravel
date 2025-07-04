<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades - Admin View</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .grades-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .student-info {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        .student-info p {
            margin: 8px 0;
            color: #444;
        }
        .student-info strong {
            color: #259747;
            margin-right: 5px;
        }
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .grades-table th {
            background: #259747;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }
        .grades-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        .grades-table tr:hover {
            background: #f5f5f5;
        }
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .print-btn {
            background: #259747;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            margin-left: 10px;
        }
        .print-btn:hover {
            background: #1e7e34;
        }
        .grade-pass {
            color: green;
            font-weight: bold;
        }
        .grade-fail {
            color: red;
            font-weight: bold;
        }
        .term-selector {
            margin-bottom: 20px;
        }
        @media print {
            .back-btn, .print-btn, .term-selector { display: none; }
            .grades-container { box-shadow: none; }
        }
    </style>
</head>
<body>
    <div class="grades-container">
        <div style="display: flex; align-items: center;">
            <a href="<?php echo e(route('admin.students.index')); ?>" class="back-btn">← Back to Students List</a>
            <button onclick="window.print()" class="print-btn">Print Grades</button>
        </div>
        
        <div class="student-info">
            <h2>Student Record</h2>
            <p><strong>Name:</strong> <?php echo e($student->name); ?></p>
            <p><strong>Student ID:</strong> <?php echo e($student->student_id); ?></p>
            <p><strong>Course:</strong> <?php echo e($student->course); ?></p>
            <p><strong>Year Level:</strong> <?php echo e($student->year); ?></p>
            <p><strong>Section:</strong> <?php echo e($student->section); ?></p>
            <p><strong>Term:</strong> <?php echo e($term); ?></p>
        </div>

        <div class="term-selector">
            <form method="GET" action="<?php echo e(route('admin.students.grades', $student->id)); ?>">
                <select name="term" onchange="this.form.submit()">
                    <option value="1st" <?php echo e($term == '1st' ? 'selected' : ''); ?>>1st Term</option>
                    <option value="2nd" <?php echo e($term == '2nd' ? 'selected' : ''); ?>>2nd Term</option>
                    <option value="3rd" <?php echo e($term == '3rd' ? 'selected' : ''); ?>>3rd Term</option>
                </select>
            </form>
        </div>

        <table class="grades-table">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject</th>
                    <th>Instructor</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($grade->subject_code); ?></td>
                        <td><?php echo e($grade->subject); ?></td>
                        <td><?php echo e($grade->instructor); ?></td>
                        <td><?php echo e(number_format($grade->grade, 2)); ?></td>
                        <td class="<?php echo e($grade->status === 'PASSED' ? 'grade-pass' : 'grade-fail'); ?>">
                            <?php echo e($grade->status); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No grades found for this term.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html> <?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/students/grades.blade.php ENDPATH**/ ?>
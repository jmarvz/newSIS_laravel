<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades</title>
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
        @media print {
            .back-btn, .print-btn { display: none; }
            .grades-container { box-shadow: none; }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .term-selector {
            margin-bottom: 20px;
        }
        .add-grade-form {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
        }
        .close {
            float: right;
            cursor: pointer;
            font-size: 28px;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #259747;
            color: white;
        }
        .btn-primary:hover {
            background-color: #1e7e34;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            margin-left: 10px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .form-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="grades-container">
        <div style="display: flex; align-items: center;">
            <a href="<?php echo e(App\Helpers\UrlHelper::getFacultyDashboardUrl()); ?>" class="back-btn">← Back to Dashboard</a>
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
            <form method="GET" action="<?php echo e(route('faculty.students.grades', $student->id)); ?>">
                <select name="term" onchange="this.form.submit()">
                    <option value="1st" <?php echo e($term == '1st' ? 'selected' : ''); ?>>1st Term</option>
                    <option value="2nd" <?php echo e($term == '2nd' ? 'selected' : ''); ?>>2nd Term</option>
                    <option value="3rd" <?php echo e($term == '3rd' ? 'selected' : ''); ?>>3rd Term</option>
                </select>
            </form>
        </div>

        <div class="add-grade-form">
            <h3>Add New Grade</h3>
            <form action="<?php echo e(route('faculty.students.grades.store', $student->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="term" value="<?php echo e($term); ?>">
                <div class="form-group">
                    <label for="subject_code">Subject Code</label>
                    <input type="text" id="subject_code" name="subject_code" required placeholder="e.g., CS101">
                </div>
                <div class="form-group">
                    <label for="subject">Subject Name</label>
                    <input type="text" id="subject" name="subject" required placeholder="e.g., Introduction to Programming">
                </div>
                <div class="form-group">
                    <label for="instructor">Instructor</label>
                    <input type="text" id="instructor" name="instructor" value="<?php echo e(auth()->user()->name); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="grade">Grade (1.00-5.00, 1.00 is highest)</label>
                    <input type="number" id="grade" name="grade" min="1" max="5" step="0.01" required placeholder="Enter grade (1.00-5.00)">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="PASSED">PASSED</option>
                        <option value="FAILED">FAILED</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Grade</button>
                    <button type="reset" class="btn btn-secondary">Clear Form</button>
                </div>
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
                    <th>Actions</th>
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
                        <td class="actions">
                            <button class="btn btn-warning" onclick="openEditModal(<?php echo e($grade->id); ?>, <?php echo e($grade->grade); ?>, '<?php echo e($grade->status); ?>')">Edit</button>
                            <button class="btn btn-danger" onclick="deleteGrade(<?php echo e($student->id); ?>, <?php echo e($grade->id); ?>)">Delete</button>
                            <form id="deleteForm_<?php echo e($grade->id); ?>" action="<?php echo e(route('faculty.students.grades.delete', ['id' => $student->id, 'gradeId' => $grade->id])); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No grades found for this term.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Grade Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h3>Edit Grade</h3>
            <form id="editGradeForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="edit_grade">Grade (1.00-5.00, 1.00 is highest)</label>
                    <input type="number" id="edit_grade" name="grade" min="1" max="5" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="edit_status">Status</label>
                    <select id="edit_status" name="status" required>
                        <option value="PASSED">PASSED</option>
                        <option value="FAILED">FAILED</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Grade</button>
            </form>
        </div>
    </div>

    <script>
        function deleteGrade(studentId, gradeId) {
            if (confirm('Are you sure you want to delete this grade?')) {
                document.getElementById('deleteForm_' + gradeId).submit();
            }
        }

        function openEditModal(gradeId, currentGrade, currentStatus) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editGradeForm');
            const gradeInput = document.getElementById('edit_grade');
            const statusSelect = document.getElementById('edit_status');
            
            form.action = "<?php echo e(url('faculty/students')); ?>/" + <?php echo e($student->id); ?> + "/grades/" + gradeId;
            gradeInput.value = currentGrade;
            statusSelect.value = currentStatus;
            modal.style.display = 'block';
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/faculty/students/grades.blade.php ENDPATH**/ ?>
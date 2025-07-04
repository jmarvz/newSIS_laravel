<!-- filepath: resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SIS – Login / Register</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
</head>
<body>
<div class="container">
    <div class="form-panel">
        <h1 class="main-title">Student Information System</h1>
        <div class="toggle-btns">
            <button id="show-login" class="active">Login</button>
            <button id="show-register">Register</button>
        </div>

        <!-- LOGIN FORM -->
        <form id="login-form" class="form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <h2>Login</h2>
            <div class="input-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="email" required />
            </div>
            <div class="input-group">
                <label for="login-pass">Password</label>
                <input type="password" id="login-pass" name="password" required />
            </div>
            <a href="<?php echo e(route('password.request')); ?>" class="forgot-password-link">Forgot Password?</a>
            <button type="submit" class="btn">Sign In</button>
        </form>

        <!-- REGISTER FORM -->
        <form id="register-form" class="form hidden" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>
            <h2>Register</h2>
            <div class="input-group">
                <label for="reg-name">Full Name</label>
                <small style="color: #666; display: block; margin-bottom: 5px;">(Format: Surname, First Name Middle Name)</small>
                <input type="text" id="reg-name" name="name" required />
            </div>
            <div class="input-group">
                <label for="reg-email">Email</label>
                <input type="email" id="reg-email" name="email" required />
            </div>
            <div class="input-group">
                <label for="reg-pass">Password</label>
                <input type="password" id="reg-pass" name="password" required />
            </div>
            <div class="input-group">
                <label for="reg-pass-confirm">Confirm Password</label>
                <input type="password" id="reg-pass-confirm" name="password_confirmation" required />
            </div>
            <div class="input-group">
                <label for="reg-contact">Contact Number</label>
                <input type="text" id="reg-contact" name="contact_number" required />
            </div>
            <div class="input-group">
                <label for="reg-role">Role</label>
                <select id="reg-role" name="role" required>
                    <option value="">Select role</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Department field for faculty -->
            <div id="faculty-department" class="hidden">
                <div class="input-group">
                    <label for="reg-department">Department</label>
                    <select id="reg-department" name="department" required>
                        <option value="">Select department</option>
                        <option value="IT">Information Technology</option>
                        <option value="HRS">Human Resource Services</option>
                        <option value="BOTH">Both Departments</option>
                    </select>
                </div>
            </div>

            <div id="student-fields" class="hidden">
                  <div class="input-group">
                    <label for="reg-student-id">Student ID</label>
                    <input type="text" id="reg-student-id" name="student_id" />
                  </div>
                  <div class="input-group">
                    <label for="reg-course">Course</label>
                    <select id="reg-course" name="course">
                      <option value="">Select course</option>
                      <option value="IT">IT</option>
                      <option value="HRS">HRS</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <label for="reg-year">Year Level</label>
                    <select id="reg-year" name="year">
                      <option value="">Select year</option>
                      <option value="1st Year">1st Year</option>
                      <option value="2nd Year">2nd Year</option>
                      <option value="3rd Year">3rd Year</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <label for="reg-section">Section</label>
                    <select id="reg-section" name="section">
                      <option value="">Select section</option>
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</div>
<script src="<?php echo e(asset('script.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if($errors->any()): ?>
        document.getElementById('register-form').classList.remove('hidden');
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('show-login').classList.remove('active');
        document.getElementById('show-register').classList.add('active');
    <?php endif; ?>

    // Handle role selection
    document.getElementById('reg-role').addEventListener('change', function() {
        const role = this.value;
        const studentFields = document.getElementById('student-fields');
        const facultyDepartment = document.getElementById('faculty-department');

        if (role === 'student') {
            studentFields.classList.remove('hidden');
            facultyDepartment.classList.add('hidden');
        } else if (role === 'faculty') {
            studentFields.classList.add('hidden');
            facultyDepartment.classList.remove('hidden');
        } else {
            studentFields.classList.add('hidden');
            facultyDepartment.classList.add('hidden');
        }
    });

    document.getElementById('show-login').addEventListener('click', function() {
        document.getElementById('login-form').classList.remove('hidden');
        document.getElementById('register-form').classList.add('hidden');
        this.classList.add('active');
        document.getElementById('show-register').classList.remove('active');
    });

    document.getElementById('show-register').addEventListener('click', function() {
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('register-form').classList.remove('hidden');
        this.classList.add('active');
        document.getElementById('show-login').classList.remove('active');
    });
});
</script>
</body>
</html><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>
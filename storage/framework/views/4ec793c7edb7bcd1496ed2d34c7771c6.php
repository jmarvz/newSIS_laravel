<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SIS Dashboard</title>
  <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
  <script>
    window.currentUserRole = "<?php echo $_SESSION['role'] ?? ''; ?>";
  </script>
</head>

<!-- Student Grades Modal -->
<div id="grades-modal" class="modal hidden">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <h2>Student Grades</h2>
    <div id="grades-details">
      <!-- Grades will be loaded here -->
    </div>
    <button id="save-grades-btn" class="action-btn hidden">Save Changes</button>
  </div>
</div>
<body>
    <div class="dash-header">
        <h1>Dashboard</h1>
        <div style="display: flex; gap: 10px; align-items: center;">
          <form method="GET" action="<?php echo e(route('dashboard')); ?>" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search students..." value="<?php echo e(request('search')); ?>" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <button type="submit" style="background: #259747; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Search</button>
          </form>
          <?php if(auth()->user()->role === 'student'): ?>
            <a href="<?php echo e(route('messages.create')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Send Message</a>
            <a href="<?php echo e(route('messages.index')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">My Messages</a>
          <?php else: ?>
            <a href="<?php echo e(route('messages.index')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Inbox</a>
          <?php endif; ?>
          <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.audit-logs.index')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Audit Logs</a>
            <a href="<?php echo e(route('admin.faculty-management.index')); ?>" class="btn-audit" style="background: #fff; color: #259747; padding: 8px 22px; border-radius: 20px; font-weight: 600; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">Faculty Management</a>
          <?php endif; ?>
          <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-logout">Logout</button>
          </form>
        </div>
  </div>
   
  <main class="dash-main">
    <section class="filters card">
      <h2 class="section-title">Filter Students</h2>
       <form method="GET" action="<?php echo e(route('dashboard')); ?>">
         <div class="filter-row">
           <div class="input-group">
            <label for="filter-course">Course</label>
            <select id="filter-course" name="course">
               <option value="">All Courses</option>
               <option value="IT" <?php echo e(request('course') == 'IT' ? 'selected' : ''); ?>>IT</option>
               <option value="HRS" <?php echo e(request('course') == 'HRS' ? 'selected' : ''); ?>>HRS</option>
            </select>
           </div>
           <div class="input-group" id="wrap-filter-year">
             <label for="filter-year">Year Level</label>
             <select id="filter-year" name="year">
              <option value="">All Years</option>
              <option value="1st Year" <?php echo e(request('year') == '1st Year' ? 'selected' : ''); ?>>1st Year</option>
              <option value="2nd Year" <?php echo e(request('year') == '2nd Year' ? 'selected' : ''); ?>>2nd Year</option>
              <option value="3rd Year" <?php echo e(request('year') == '3rd Year' ? 'selected' : ''); ?>>3rd Year</option>
             </select>
           </div>
          <div class="input-group" id="wrap-filter-section">
            <label for="filter-section">Section</label>
            <select id="filter-section" name="section">
              <option value="">All Sections</option>
              <option value="AM" <?php echo e(request('section') == 'AM' ? 'selected' : ''); ?>>AM</option>
              <option value="PM" <?php echo e(request('section') == 'PM' ? 'selected' : ''); ?>>PM</option>
            </select>

          </div>
          <div class="input-group" id="wrap-filter-term">
             <label for="filter-term">Term</label>
             <select id="filter-term" name="term">
               <option value="">Select Term</option>
               <option value="1st" <?php echo e(request('term') == '1st' ? 'selected' : ''); ?>>1st Term</option>
               <option value="2nd" <?php echo e(request('term') == '2nd' ? 'selected' : ''); ?>>2nd Term</option>
               <option value="3rd" <?php echo e(request('term') == '3rd' ? 'selected' : ''); ?>>3rd Term</option>
             </select>
             <button type="button" id="schedule-btn" class="btn" disabled>Schedule</button>
             <button type="submit" class="btn" style="width: auto; margin-top: 10px;">Filter</button>
          </div>
        </div>
      </form>
    </section>

    <section class="student-list card">
      <h2 class="section-title">Registered Students</h2>
      <div class="table-responsive">
        <table id="students-table">
          <thead>
           <tr>
             <th>Student ID</th>
             <th>Name</th>
             <th>Email</th>
             <th>Course</th>
             <th>Year Level</th>
             <th>Section</th>
             <th>Grades</th>
           </tr>
         </thead>
          <tbody>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   <td><?php echo e($user->student_id ?? ''); ?></td>
                   <td><?php echo e($user->name); ?></td>
                   <td><?php echo e($user->email); ?></td>
                   <td><?php echo e($user->course ?? ''); ?></td>
                   <td><?php echo e($user->year ?? ''); ?></td>
                   <td><?php echo e($user->section ?? ''); ?></td>
                   <td>
                      <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'faculty' || auth()->user()->id == $user->id): ?>
                         <?php if(auth()->user()->role === 'admin'): ?>
                             <a href="<?php echo e(route('admin.students.edit', $user->id)); ?>" class="btn-edit" title="Edit Student">&#9998;</a>
                             <form action="<?php echo e(route('admin.students.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('DELETE'); ?>
                                 <button type="submit" class="btn-delete" title="Delete Student" onclick="return confirm('Are you sure?')">&#128465;</button>
                             </form>
                             <a href="<?php echo e(route('admin.students.grades', ['id' => $user->id, 'term' => request('term')])); ?>"
                               class="btn-view-circle"
                               title="View Grades"
                               target="_blank">
                                👁️
                             </a>
                         <?php elseif(auth()->user()->role === 'faculty'): ?>
                             <a href="<?php echo e(route('faculty.students.grades', ['id' => $user->id, 'term' => request('term')])); ?>"
                               class="btn-view-circle"
                               title="View Grades"
                               target="_blank">
                                👁️
                             </a>
                         <?php elseif(auth()->user()->role === 'student' && auth()->user()->id === $user->id): ?>
                             <a href="<?php echo e(route('student.grades', ['term' => request('term')])); ?>"
                               class="btn-view-circle"
                               title="View My Grades"
                               target="_blank">
                               👁️
                             </a>
                         <?php endif; ?>
                      <?php endif; ?>
                  </td>
                </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
      </div>
    </section>
  </main>

  <script src="<?php echo e(asset('script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>
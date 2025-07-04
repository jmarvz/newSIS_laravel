<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Management</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            margin: 20px;
        }
        .alert {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 6px;
            color: white;
        }
        .alert-success {
            background-color: #28a745;
        }
        .alert-danger {
            background-color: #dc3545;
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
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-audit:hover {
            background: #1a7a37;
            transform: translateY(-1px);
        }
        .btn-audit .badge {
            background: #fff;
            color: #259747;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table th,
        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
            text-align: left;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #333;
        }
        .table tbody td {
            font-size: 0.95rem;
            color: #444;
        }
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 20px 0;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            color: #259747;
            background: #f0f9f4;
            transition: all 0.2s ease;
        }
        .pagination a:hover {
            background: #259747;
            color: white;
        }
        .pagination .active {
            background: #259747;
            color: white;
        }
    </style>
</head>
<body>
    <div class="dash-header">
        <h1>Faculty Management</h1>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn-audit">
                <span class="badge">Home</span>
                Dashboard
            </a>
            <a href="<?php echo e(route('admin.faculty-management.create')); ?>" class="btn-audit">
                <span class="badge">+</span>
                Add Faculty Member
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-audit">
                    <span class="badge">→</span>
                    Logout
                </button>
            </form>
        </div>
    </div>

    <main class="dash-main">
        <div class="card">
            <!-- Display success message -->
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Display error message -->
            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Faculty List</h2>
            </div>

            <div class="table-responsive">
                <table class="table" style="border-collapse: separate; border-spacing: 0;">
                    <thead>
                        <tr style="background: #259747; color: white;">
                            <th style="padding: 1rem; font-weight: 600; text-align: left;">Name</th>
                            <th style="padding: 1rem; font-weight: 600; text-align: left;">Email</th>
                            <th style="padding: 1rem; font-weight: 600; text-align: left;">Department</th>
                            <th style="padding: 1rem; font-weight: 600; text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr style="background: white;">
                                <td style="padding: 1rem; border-bottom: 1px solid #dee2e6;">
                                    <h4 style="margin: 0; color: #259747; font-weight: 500;"><?php echo e($faculty->name); ?></h4>
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #dee2e6;">
                                    <span style="color: #444;"><?php echo e($faculty->email); ?></span>
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #dee2e6;">
                                    <span style="color: #259747; font-weight: 500;"><?php echo e($faculty->department); ?></span>
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #dee2e6;">
                                    <div class="action-buttons" style="display: flex; gap: 10px;">
                                        <a href="<?php echo e(route('admin.faculty-management.edit', $faculty)); ?>" class="btn-audit btn-sm" style="background: #259747; color: white; padding: 8px 16px;">
                                            <span class="badge" style="background: white; color: #259747;">✏️</span>
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('admin.faculty-management.destroy', $faculty)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-audit btn-sm" onclick="return confirm('Are you sure you want to delete this faculty member?')" style="background: #dc3545; color: white; padding: 8px 16px;">
                                                <span class="badge" style="background: white; color: #dc3545;">🗑️</span>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination" style="margin-top: 20px;">
                <?php echo e($faculties->links()); ?>

            </div>
        </div>
    </main>
</body>
</html>
<?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/faculty-management/index.blade.php ENDPATH**/ ?>
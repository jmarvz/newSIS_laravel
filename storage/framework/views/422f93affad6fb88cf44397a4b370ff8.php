<?php if(auth()->user()->role === 'admin'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles.css')); ?>">
    <style>
        .audit-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .filters {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .filter-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }
        .filter-group {
            flex: 1;
        }
        .filter-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .audit-container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 20px;
        }
        .filters {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .filter-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        .filter-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .audit-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .audit-table th {
            background: #259747;
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
        }
        .audit-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        .audit-table tr:hover {
            background: #f5f5f5;
        }
        .action-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .action-create { background: #28a745; color: white; }
        .action-update { background: #ffc107; color: #000; }
        .action-delete { background: #dc3545; color: white; }
        .action-view { background: #17a2b8; color: white; }
        .module-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            background: #259747;
            color: white;
        }
        .btn-filter {
            background: #259747;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-filter:hover {
            background: #1e7e34;
            transform: translateY(-1px);
        }
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.2s ease;
        }
        .back-btn:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }
        .pagination a.active {
            background: #259747;
            color: white;
            border-color: #259747;
        }
    </style>
</head>
<body>
    <div class="audit-container">
        <a href="<?php echo e(route('dashboard')); ?>" class="back-btn">← Back to Dashboard</a>
        
        <h1>Audit Logs</h1>

        <div class="filters">
            <form method="GET" action="<?php echo e(route('admin.audit-logs.index')); ?>">
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="module">Module</label>
                        <select name="module" id="module">
                            <option value="">All Modules</option>
                            <optgroup label="Student Management">
                                <option value="Students" <?php echo e(request('module') == 'Students' ? 'selected' : ''); ?>>Students</option>
                            </optgroup>
                            <optgroup label="Faculty Management">
                                <option value="Faculty" <?php echo e(request('module') == 'Faculty' ? 'selected' : ''); ?>>Faculty</option>
                            </optgroup>
                            <optgroup label="Communication">
                                <option value="Messages" <?php echo e(request('module') == 'Messages' ? 'selected' : ''); ?>>Messages</option>
                            </optgroup>
                            <optgroup label="Academics">
                                <option value="Grades" <?php echo e(request('module') == 'Grades' ? 'selected' : ''); ?>>Grades</option>
                                <option value="Schedule" <?php echo e(request('module') == 'Schedule' ? 'selected' : ''); ?>>Schedule</option>
                            </optgroup>
                            <optgroup label="System Management">
                                <option value="Audit Logs" <?php echo e(request('module') == 'Audit Logs' ? 'selected' : ''); ?>>Audit Logs</option>
                                <option value="System" <?php echo e(request('module') == 'System' ? 'selected' : ''); ?>>System</option>
                                <option value="Settings" <?php echo e(request('module') == 'Settings' ? 'selected' : ''); ?>>Settings</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="action">Action</label>
                        <select name="action" id="action">
                            <option value="">All Actions</option>
                            <option value="create">Create</option>
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                            <option value="sent_messages">Sent Messages</option>
                                    'Student Management' => [
                                        'create', 'read', 'view', 'update', 'edit', 'delete', 
                                        'import', 'export', 'approve', 'reject', 'register', 
                                        'enroll', 'drop', 'transfer', 'promote', 'graduate'
                                    ],
                                    'Faculty Management' => [
                                        'create', 'read', 'view', 'update', 'edit', 'delete', 
                                        'import', 'export', 'assign', 'revoke', 'schedule', 
                                        'block', 'unblock', 'hire', 'terminate'
                                    ],
                                    'Communication' => [
                                        'create', 'read', 'view', 'update', 'edit', 'delete', 
                                        'send', 'receive', 'notify', 'broadcast', 'reply', 
                                        'archive', 'restore'
                                    ],
                                    'Academics' => [
                                        'create', 'read', 'view', 'update', 'edit', 'delete', 
                                        'import', 'export', 'submit', 'approve', 'reject', 
                                        'grade', 'evaluate', 'assess', 'schedule', 'plan', 
                                        'syllabus', 'curriculum'
                                    ],
                                    'System Management' => [
                                        'backup', 'restore', 'configure', 'reset', 'update', 
                                        'edit', 'view', 'read', 'setup', 'maintain', 
                                        'optimize', 'secure'
                                    ]
                                ];
                            @endphp
                            
                            <optgroup label="System Actions">
                                <option value="login" <?php echo e(request('action') == 'login' ? 'selected' : ''); ?>>Login</option>
                                <option value="logout" <?php echo e(request('action') == 'logout' ? 'selected' : ''); ?>>Logout</option>
                                <option value="import" <?php echo e(request('action') == 'import' ? 'selected' : ''); ?>>Import</option>
                                <option value="export" <?php echo e(request('action') == 'export' ? 'selected' : ''); ?>>Export</option>
                                <option value="backup" <?php echo e(request('action') == 'backup' ? 'selected' : ''); ?>>Backup</option>
                                <option value="restore" <?php echo e(request('action') == 'restore' ? 'selected' : ''); ?>>Restore</option>
                            </optgroup>
                            <optgroup label="Configuration">
                                <option value="configure" <?php echo e(request('action') == 'configure' ? 'selected' : ''); ?>>Configure</option>
                                <option value="reset" <?php echo e(request('action') == 'reset' ? 'selected' : ''); ?>>Reset</option>
                                <option value="approve" <?php echo e(request('action') == 'approve' ? 'selected' : ''); ?>>Approve</option>
                                <option value="reject" <?php echo e(request('action') == 'reject' ? 'selected' : ''); ?>>Reject</option>
                            </optgroup>
                            <optgroup label="Workflow">
                                <option value="submit" <?php echo e(request('action') == 'submit' ? 'selected' : ''); ?>>Submit</option>
                                <option value="cancel" <?php echo e(request('action') == 'cancel' ? 'selected' : ''); ?>>Cancel</option>
                                <option value="archive" <?php echo e(request('action') == 'archive' ? 'selected' : ''); ?>>Archive</option>
                                <option value="restore" <?php echo e(request('action') == 'restore' ? 'selected' : ''); ?>>Restore</option>
                            </optgroup>
                            <optgroup label="Security">
                                <option value="block" <?php echo e(request('action') == 'block' ? 'selected' : ''); ?>>Block</option>
                                <option value="unblock" <?php echo e(request('action') == 'unblock' ? 'selected' : ''); ?>>Unblock</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="from_date">From Date</label>
                        <input type="date" name="from_date" id="from_date" value="<?php echo e(request('from_date')); ?>">
                    </div>
                    <div class="filter-group">
                        <label for="to_date">To Date</label>
                        <input type="date" name="to_date" id="to_date" value="<?php echo e(request('to_date')); ?>">
                    </div>
                    <div class="filter-group" style="display: flex; align-items: flex-end;">
                        <button type="submit" class="btn-filter">Apply Filters</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="audit-table">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>User</th>
                    <th>Module</th>
                    <th>Action</th>
                    <th>Description</th>
                    <th>IP Address</th>
                    <th>Device</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $auditLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($log->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td>
                            <strong><?php echo e($log->user->name); ?></strong><br>
                            <small><?php echo e($log->user->email); ?></small>
                        </td>
                        <td>
                            <span class="module-badge"><?php echo e($log->module); ?></span>
                        </td>
                        <td>
                            <span class="action-badge action-<?php echo e(strtolower($log->action)); ?>">
                                <?php echo e($log->action); ?>

                            </span>
                        </td>
                        <td><?php echo e($log->description); ?></td>
                        <td><?php echo e($log->ip_address); ?></td>
                        <td>
                            <small><?php echo e($log->user_agent); ?></small>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">
                            <div style="padding: 20px;">
                                <h3>No audit logs found</h3>
                                <p>Try adjusting the filters or expanding the date range.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php echo e($auditLogs->links()); ?>

        </div>
    </div>
</body>
</html>
<?php endif; ?> <?php /**PATH C:\Users\Jayson Bornas\OneDrive\Desktop\xampp\htdocs\newSIS_laravel\resources\views/admin/audit-logs/index.blade.php ENDPATH**/ ?>
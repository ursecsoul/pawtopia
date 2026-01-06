<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Pawtopia'); ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    <style>
        .alert {
            margin: 1rem;
            border-radius: 0.5rem;
        }
        .action-buttons .btn {
            margin: 0 0.25rem;
        }
        .star {
            color: #ddd;
            font-size: 1.25rem;
        }
        .star.filled {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\pawtopia\resources\views/layouts/app.blade.php ENDPATH**/ ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Dashboard',
    'subtitle' => 'Overview',
    'icon' => 'home',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => 'Dashboard',
    'subtitle' => 'Overview',
    'icon' => 'home',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="dashboard-header">
    <div class="header-left">
        <span class="header-title"><?php echo e($title); ?></span>
        <div class="header-subtitle"><?php echo e($subtitle); ?></div>
    </div>
    <div class="header-profile">
        <!-- NOTIFICATION ICON -->
        <div class="notification-icon" onclick="toggleNotificationModal()">
            <img src="<?php echo e(asset('images/notif.svg')); ?>" alt="Notifications" class="notification-img">
            <span class="badge" id="notificationBadge">3</span>
        </div>

        <!-- PROFILE INFO -->
        <div class="profile-info">
            <div class="profile-details">
                <span class="profile-name"><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
                <span class="profile-email"><?php echo e(Auth::user()->email ?? 'admin@example.com'); ?></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pawtopia\resources\views/components/dashboard-header.blade.php ENDPATH**/ ?>
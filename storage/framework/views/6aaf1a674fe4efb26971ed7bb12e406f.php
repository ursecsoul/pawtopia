<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><?php echo e(__('Verifikasi OTP')); ?></div>

                <div class="card-body">
                    <?php if(session('otp')): ?>
                        <div class="alert alert-info">
                            <strong>Kode OTP Anda: <?php echo e(session('otp')); ?></strong><br>
                            <small class="text-muted">* Hanya untuk keperluan pengembangan</small>
                        </div>
                    <?php endif; ?>

                    <?php if(session('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('otp.verify')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="phone" value="<?php echo e($phone); ?>">
                        <input type="hidden" name="user_type" value="<?php echo e($userType); ?>">

                        <div class="form-group row mb-3">
                            <label for="otp" class="col-md-4 col-form-label text-md-right">
                                <?php echo e(__('Kode OTP')); ?>

                            </label>

                            <div class="col-md-6">
                                <input id="otp" type="text" 
                                       class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="otp" 
                                       value="<?php echo e(old('otp')); ?>" 
                                       required 
                                       autocomplete="off"
                                       autofocus
                                       maxlength="6">

                                <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Verifikasi')); ?>

                                </button>

                                <a class="btn btn-link" href="<?php echo e(route('otp.resend', ['phone' => $phone, 'user_type' => $userType])); ?>">
                                    <?php echo e(__('Kirim Ulang OTP')); ?>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\pawtopia\resources\views/auth/verify-otp.blade.php ENDPATH**/ ?>
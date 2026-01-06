<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Transaction History - Pawtopia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            color: #674337;
        }

        .container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 40px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #8A6552;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #999;
        }

        .transactions-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .transaction-card {
            background-color: #fbe1c3;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .transaction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .transaction-info {
            flex: 1;
        }

        .transaction-order {
            font-size: 14px;
            color: #8A6552;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .transaction-title {
            font-size: 18px;
            font-weight: 600;
            color: #674337;
            margin-bottom: 8px;
        }

        .transaction-details {
            font-size: 14px;
            color: #999;
            display: flex;
            gap: 20px;
        }

        .transaction-amount {
            text-align: right;
            margin: 0 20px;
        }

        .amount-value {
            font-size: 24px;
            font-weight: 700;
            color: #8A6552;
            margin-bottom: 5px;
        }

        .amount-date {
            font-size: 13px;
            color: #999;
        }

        .transaction-status {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            min-width: 100px;
        }

        .status-settlement {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-failed {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: #8A6552;
            color: white;
        }

        .action-btn:hover {
            background-color: #6c4f3d;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 600;
            color: #8A6552;
            margin-bottom: 10px;
        }

        .empty-text {
            font-size: 16px;
            color: #999;
            margin-bottom: 30px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border-radius: 10px;
            text-decoration: none;
            color: #8A6552;
            background-color: #fbe1c3;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background-color: #f5d4a8;
        }

        .pagination .active {
            background-color: #8A6552;
            color: white;
        }

        @media (max-width: 768px) {
            .transaction-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .transaction-amount {
                text-align: left;
                margin: 0;
            }

            .transaction-status {
                align-items: flex-start;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Transaction History 💳</h1>
            <p class="page-subtitle">View all your payment transactions</p>
        </div>

        <?php if($transactions->count() > 0): ?>
            <div class="transactions-list">
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="transaction-card">
                        <div class="transaction-info">
                            <div class="transaction-order">#<?php echo e($transaction->order_id); ?></div>
                            <div class="transaction-title">
                                <?php if($transaction->transactable_type === 'App\Models\Booking'): ?>
                                    <?php echo e(ucfirst($transaction->transactable->service_type)); ?> - <?php echo e($transaction->transactable->pet_name); ?>

                                <?php else: ?>
                                    Transaction
                                <?php endif; ?>
                            </div>
                            <div class="transaction-details">
                                <span><?php echo e($transaction->created_at->format('d M Y')); ?></span>
                                <?php if($transaction->payment_type): ?>
                                    <span><?php echo e(strtoupper(str_replace('_', ' ', $transaction->payment_type))); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="transaction-amount">
                            <div class="amount-value">Rp <?php echo e(number_format($transaction->gross_amount, 0, ',', '.')); ?></div>
                            <?php if($transaction->paid_at): ?>
                                <div class="amount-date">Paid: <?php echo e($transaction->paid_at->format('d M Y')); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="transaction-status">
                            <span class="status-badge 
                                <?php if($transaction->transaction_status === 'settlement'): ?>
                                    status-settlement
                                <?php elseif($transaction->transaction_status === 'pending'): ?>
                                    status-pending
                                <?php else: ?>
                                    status-failed
                                <?php endif; ?>
                            ">
                                <?php echo e(strtoupper($transaction->transaction_status)); ?>

                            </span>

                            <?php if($transaction->transaction_status === 'settlement'): ?>
                                <?php if($transaction->transactable_type === 'App\Models\Booking'): ?>
                                    <a href="<?php echo e(route('booking.show', $transaction->transactable->id)); ?>" class="action-btn">
                                        View Booking
                                    </a>
                                <?php endif; ?>
                            <?php elseif($transaction->transaction_status === 'pending'): ?>
                                <button class="action-btn" onclick="payNow('<?php echo e($transaction->snap_token); ?>', '<?php echo e($transaction->order_id); ?>')">
                                    Pay Now
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php echo e($transactions->links()); ?>

            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <h2 class="empty-title">No Transactions Yet</h2>
                <p class="empty-text">You haven't made any transactions yet. Start booking our services!</p>
                <a href="<?php echo e(route('booking')); ?>" class="action-btn">Book Now</a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function payNow(snapToken, orderId) {
            if (!snapToken) {
                alert('Payment session has expired. Please create a new booking.');
                return;
            }

            snap.pay(snapToken, {
                onSuccess: function(result) {
                    window.location.href = '/payment/success/' + orderId;
                },
                onPending: function(result) {
                    alert('Payment is pending. Please complete your payment.');
                },
                onError: function(result) {
                    window.location.href = '/payment/failed/' + orderId;
                },
                onClose: function() {
                    console.log('Payment popup closed');
                }
            });
        }
    </script>

    <!-- Midtrans Snap -->
    <script src="https://app.<?php echo e(config('midtrans.is_production') ? '' : 'sandbox.'); ?>midtrans.com/snap/snap.js" 
            data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pawtopia\resources\views/payment/history.blade.php ENDPATH**/ ?>
 <?php $__env->startSection('title', 'Create New Transaction - Customer Portal PLN'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Transaction Form</h1>
        <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Back to Transaction List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Transaction Details</h6>
                </div>
                <div class="card-body">
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('transactions.store')); ?>">
                        <?php echo csrf_field(); ?> 

                        <div class="form-group">
                            <label for="amount">Payment Amount (Rupiah)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="amount" name="amount" placeholder="Example: 50000"
                                       value="<?php echo e(old('amount')); ?>" required min="1"> 
                            </div>
                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">Enter the total amount to be paid.</small>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="payment_method" name="payment_method" required>
                                <option value="" disabled <?php echo e(old('payment_method') ? '' : 'selected'); ?>>Select Payment Method...</option>
                                <option value="E-Wallet" <?php echo e(old('payment_method') == 'E-Wallet' ? 'selected' : ''); ?>>E-Wallet</option>
                                <option value="Virtual Account" <?php echo e(old('payment_method') == 'Virtual Account' ? 'selected' : ''); ?>>Virtual Account</option>
                            </select>
                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">Choose how you will make the payment.</small>
                        </div>

                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i> Create Transaction Bill
                            </button>
                            <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-light ml-2">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Additional Information</h6>
                </div>
                <div class="card-body">
                    <p>
                        After you submit this form, a transaction bill will be created with the initial status "Pending Payment" (Owing).
                    </p>
                    <p>
                        The transaction date will be recorded automatically.
                    </p>
                    <p>
                        Based on the selected payment method:
                        <ul>
                            <li><strong>Virtual Account</strong>: You will receive a VA number for payment.</li>
                            <li><strong>E-Wallet</strong>: You will receive a QR Code to scan.</li>
                        </ul>
                    </p>
                    <p>
                        <i class="fas fa-info-circle text-info"></i> A 20-digit electricity token will be provided after your payment is confirmed.
                    </p>
                    <hr>
                    <p class="small text-muted">
                        Please ensure the amount and payment method you entered are correct.
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\resources\views/pages/transaction/create.blade.php ENDPATH**/ ?>
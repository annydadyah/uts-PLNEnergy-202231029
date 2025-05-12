

<?php $__env->startSection('title', 'Dashboard - Customer Portal PLN'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-[0_4px_36px_rgba(0,0,0,0.08)] overflow-hidden">
        <div class="bg-[#F8FAFC] border-b border-gray-200 p-6">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-[#1E293B]">Profile Information</h1>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="m-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <?php if(Auth::check()): ?>
        <div class="p-6">
            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Full Name</h3>
                            <p class="text-lg font-bold text-[#1E293B]"><?php echo e(Auth::user()->name); ?></p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Email Address</h3>
                            <p class="text-lg font-bold text-[#1E293B]"><?php echo e(Auth::user()->email); ?></p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">KWH Meter Code</h3>
                            <p class="text-lg font-bold text-[#1E293B]"><?php echo e(Auth::user()->kwh_meter_code); ?></p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Account Status</h3>
                            <p class="text-lg font-bold text-green-600">Active</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo e(route('profile.edit')); ?>" 
                       class="bg-[#3B82F6] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#2563EB] transition-colors focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:ring-opacity-50 text-center">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    <button data-modal-toggle="delete-modal"
                            class="bg-[#EF4444] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#DC2626] transition-colors focus:outline-none focus:ring-2 focus:ring-[#EF4444] focus:ring-opacity-50 text-center">
                        <i class="fas fa-trash-alt mr-2"></i> Delete Account
                    </button>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete-modal" tabindex="-1" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden">
                <div class="relative">
                    <div class="absolute top-4 right-4">
                        <button data-modal-hide="delete-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-8 text-center">
                        <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Delete Account
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Are you sure you want to delete your account? This action is permanent and will delete:
                        </p>
                        <ul class="text-left text-gray-600 mb-6 mx-auto max-w-xs">
                            <li class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Your account information
                            </li>
                            <li class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                All transaction history
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Your preferences and settings
                            </li>
                        </ul>
                        <div class="flex space-x-4">
                            <form action="<?php echo e(route('profile.destroy')); ?>" method="POST" class="w-full">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="w-full py-3 px-4 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Yes, Delete My Account
                                </button>
                            </form>
                            <button data-modal-hide="delete-modal" type="button" class="w-full py-3 px-4 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="text-center py-16">
            <p class="text-gray-500 text-xl">User not authenticated.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteModal = document.getElementById('delete-modal');
        const deleteModalToggleButtons = document.querySelectorAll('[data-modal-toggle="delete-modal"]');
        const deleteModalHideButtons = document.querySelectorAll('[data-modal-hide="delete-modal"]');

        if (deleteModal && deleteModalToggleButtons && deleteModalHideButtons) {
            deleteModalToggleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    deleteModal.classList.remove('hidden');
                });
            });

            deleteModalHideButtons.forEach(button => {
                button.addEventListener('click', () => {
                    deleteModal.classList.add('hidden');
                });
            });

            // Close modal when clicking outside
            deleteModal.addEventListener('click', (e) => {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>
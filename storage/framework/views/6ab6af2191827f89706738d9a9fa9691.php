

<?php $__env->startSection('title', 'Dashboard - Customer Portal PLN'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6 border-b-2 pb-3">Informasi Pengguna</h2>
            <?php if(Auth::check()): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <i class="fas fa-user mr-2 text-blue-500"></i> Nama
                            </label>
                            <div class="bg-gray-100 rounded-md shadow-inner p-4 text-lg text-blue-700 font-medium">
                                <?php echo e(Auth::user()->name); ?>

                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <i class="fas fa-envelope mr-2 text-green-500"></i> Email
                            </label>
                            <div class="bg-gray-100 rounded-md shadow-inner p-4 text-lg text-green-700 font-medium">
                                <?php echo e(Auth::user()->email); ?>

                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <i class="fas fa-bolt mr-2 text-yellow-500"></i> Kode KWH Meter
                            </label>
                            <div class="bg-gray-100 rounded-md shadow-inner p-4 text-lg text-yellow-700 font-medium">
                                <?php echo e(Auth::user()->kwh_meter_code); ?>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between space-y-4 md:space-y-0">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-3">Tindakan</h3>
                            <div class="space-y-2">
                                <a href="<?php echo e(route('profile.edit')); ?>" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-edit mr-2"></i> Edit Profil
                                </a>
                                <button data-modal-toggle="delete-modal" class="inline-flex items-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-trash-alt mr-2"></i> Hapus Akun
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full transition-all duration-300 transform">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Konfirmasi Hapus Akun
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="delete-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-500">
                                    Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.
                                </p>
                            </div>
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                <form action="<?php echo e(route('profile.destroy')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Ya, Hapus Akun
                                    </button>
                                </form>
                                <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">Pengguna tidak terautentikasi.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        // Inisialisasi modal (pastikan Anda telah menyertakan library seperti Flowbite atau implementasi modal kustom)
        document.addEventListener('DOMContentLoaded', () => {
            const deleteModal = document.getElementById('delete-modal');
            const deleteModalToggleButtons = document.querySelectorAll('[data-modal-toggle="delete-modal"]');
            const deleteModalHideButtons = document.querySelectorAll('[data-modal-hide="delete-modal"]');

            if (deleteModal && deleteModalToggleButtons && deleteModalHideButtons) {
                deleteModalToggleButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        deleteModal.classList.remove('hidden');
                        deleteModal.setAttribute('aria-modal', 'true');
                        deleteModal.setAttribute('role', 'dialog');
                        deleteModal.removeAttribute('aria-hidden');
                    });
                });

                deleteModalHideButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        deleteModal.classList.add('hidden');
                        deleteModal.removeAttribute('aria-modal');
                        deleteModal.removeAttribute('role');
                        deleteModal.setAttribute('aria-hidden', 'true');
                    });
                });
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\resources\views/pages/profile.blade.php ENDPATH**/ ?>
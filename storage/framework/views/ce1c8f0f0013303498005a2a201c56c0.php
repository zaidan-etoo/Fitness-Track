

<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 800px; margin: 2rem auto; padding: 20px;">
    <h2>Your Workout Log</h2>

    <?php if(session('success')): ?>
        <div style="background: #10b981; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($workouts->isEmpty()): ?>
        <p>No workouts yet. <a href="<?php echo e(route('workouts.create')); ?>" style="color: #3b82f6;">Add your first workout!</a></p>
    <?php else: ?>
        <?php $__currentLoopData = $workouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="border: 1px solid #f2f8ff; border-radius: 8px; padding: 16px; margin-bottom: 12px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <strong><?php echo e($w->workout_name); ?></strong>
                    <span class="badge" style="background: #000000; color: #4f46e5; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; margin-left: 8px;">
                        <?php echo e($w->workout_type); ?>

                    </span>
                    <p style="margin: 4px 0; font-size: 0.85rem; color: #64748b;">
                        <?php echo e($w->created_at->format('d M Y')); ?>

                    </p>
                </div>
                <div style="text-align: right; display: flex; align-items: center; gap: 12px;">
                    <p><strong><?php echo e($w->duration); ?> min</strong></p>
                    
                    <!-- Tombol Remove -->
                    <form method="POST" action="<?php echo e(route('workouts.destroy', $w->id)); ?>" style="margin: 0;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to remove this workout?')"
                                style="background: #dc2626; color: white; border: none; padding: 4px 10px; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                            Remove
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div style="margin-top: 20px;">
        <a href="<?php echo e(route('workouts.create')); ?>" style="background: #3b82f6; color: white; padding: 10px 16px; border-radius: 4px; text-decoration: none; display: inline-block;">
            + Add New Workout
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Installation Xampp\htdocs\laravel\fittrack-laravel\resources\views/workouts/index.blade.php ENDPATH**/ ?>
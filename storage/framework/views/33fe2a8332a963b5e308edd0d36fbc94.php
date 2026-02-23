

<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 500px; margin: 2rem auto; padding: 20px; background: #0f172a; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.3);">
    
    <a href="<?php echo e(route('dashboard')); ?>" 
       style="display: inline-block; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; padding: 10px 16px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-bottom: 20px;">
        ← Dashboard
    </a>

    <h2 style="color: #f8fafc; margin-bottom: 24px;">Add New Workout</h2>
    
    <?php if(session('success')): ?>
        <div style="background: #10b981; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('workouts.store')); ?>">
        <?php echo csrf_field(); ?>
        
        <div style="background: #1e293b; border-radius: 20px; padding: 1.5rem; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3); border: 1px solid #334155; margin-bottom: 16px;">
            <label style="display: block; color: #f8fafc; margin-bottom: 8px;">Type</label>
            <select name="workout_type" required 
                    style="width: 100%; padding: 10px; background: #0f172a; border: 1px solid #334155; border-radius: 6px; color: #f8fafc;">
                <option value="">Pilih olahraga</option>
                <option value="Push Up">Push Up</option>
                <option value="Pull Up">Pull Up</option>
                <option value="Run">Run</option>
                <option value="Lift Weight">Lift Weight</option>
                <option value="Squat">Squat</option>
                <option value="Sit Up">Sit Up</option>
            </select>
        </div>

        <div style="background: #1e293b; border-radius: 20px; padding: 1.5rem; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3); border: 1px solid #334155; margin-bottom: 24px;">
            <label style="display: block; color: #f8fafc; margin-bottom: 8px;">Duration (min)</label>
            <input type="number" name="duration" min="1" required 
                   style="width: 100%; padding: 10px; background: #0f172a; border: 1px solid #334155; border-radius: 6px; color: #f8fafc;">
        </div>

        <button type="submit" 
                style="width: 100%; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; border: none; padding: 14px; border-radius: 8px; font-weight: 600; cursor: pointer;">
            Save Workout
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Installation Xampp\htdocs\laravel\fittrack-laravel\resources\views/workouts/create.blade.php ENDPATH**/ ?>
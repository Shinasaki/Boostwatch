<?php $__env->startSection('content'); ?>
    <div class="layout divFull">
        <div class="layout-box">
            <?php echo e(Form::open(array('route' => 'login'))); ?>

            <div class="form-group font-large color-black">
                <?php echo app('translator')->getFromJson('auth.login'); ?>
            </div>
            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" <?php echo e($errors->has('email') ? ' has-error' : ''); ?> name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth.form_email'); ?>" required autofocus>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <input type="password" <?php echo e($errors->has('password') ? ' has-error' : ''); ?> name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth.form_pass'); ?>" required>
            </div>


            <div class="form-group">
                <?php if($errors->any()): ?>
                    <span class="help-block">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>- <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <br />
                <button type="submit" id="button2"/><?php echo app('translator')->getFromJson('auth.login'); ?></button>
                <br /><hr class="bg-white"/>
                <a href="/register" class="color-black font-medium"><?php echo app('translator')->getFromJson('auth.register'); ?></a><br />
                <a href="/password/reset" class="color-black font-medium"><?php echo app('translator')->getFromJson('auth.reset'); ?></a>
            </div>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
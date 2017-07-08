<?php $__env->startSection('content'); ?>
    <div class="layout divFull">
        <div class="layout-box">
            <?php echo e(Form::open(array('route' => 'register'))); ?>

            <div class="form-group font-large color-black">
                <?php echo app('translator')->getFromJson('auth.register'); ?>
            </div>
            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" class="<?php echo e($errors->has('email') ? ' has-error' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth.form_email'); ?>" required autofocus>
            </div>

            <div class="form-group">
                <input type="text" class="left <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth.form_name'); ?>" required autofocus style="width: 45%;">

                <input type="text" class="right <?php echo e($errors->has('lastsurname') ? ' has-error' : ''); ?>" name="surname" value="<?php echo e(old('surname')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth.form_surname'); ?>" required autofocus style="width: 45%;" >
            </div>




            <div class="clear form-group">
                <input type="password" class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?>" name="password" placeholder="<?php echo app('translator')->getFromJson('auth.form_pass'); ?>" required>
                <input type="password" class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?>" name="password_confirmation" placeholder="<?php echo app('translator')->getFromJson('auth.form_repass'); ?>" required>
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
                <button type="submit" id="button2"/><?php echo app('translator')->getFromJson('auth.register'); ?></button>
                <br /><hr class="bg-white"/>
                <a href="/login" class="color-black font-medium"><?php echo app('translator')->getFromJson('auth.login'); ?></a>
            </div>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
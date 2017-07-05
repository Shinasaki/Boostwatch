<?php echo $__env->make('layouts._language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="landing">
        <div class="landing-bg divFull">
            <div class="landing-logo imgFit">
                <a href="boost"><img src="<?php echo e(asset('image/landing/logo.png')); ?>"/></a>
            </div>
            <div class="landing-popup">
                <ul>
                    <a>
                        <li>
                            <?php echo app('translator')->getFromJson('landing.prop-1'); ?>
                             &nbsp;&nbsp;
                            <i class="fa fa-shield" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a>
                        <li>
                            <?php echo app('translator')->getFromJson('landing.prop-2'); ?> &nbsp;&nbsp;
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a>
                        <li>
                            <?php echo app('translator')->getFromJson('landing.prop-3'); ?> &nbsp;&nbsp;
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="http://youtube.com" target="_blank">
                        <li>
                            <?php echo app('translator')->getFromJson('landing.prop-4'); ?> &nbsp;&nbsp;
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
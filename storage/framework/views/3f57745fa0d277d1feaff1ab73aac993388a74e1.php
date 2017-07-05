<?php echo $__env->make('layouts._language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('boost-content'); ?>
    Leveling
    <?php echo app('translator')->getFromJson('header.home'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boost.boost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
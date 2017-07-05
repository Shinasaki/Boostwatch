<?php $__env->startSection('content'); ?>
    <div style="z-index:5;position:fixed">
        <button onclick="doorOpen()">Open</button>
        <button onclick="doorClose()" >Close</button>
    </div>
    <div class="landing">
        Landing
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
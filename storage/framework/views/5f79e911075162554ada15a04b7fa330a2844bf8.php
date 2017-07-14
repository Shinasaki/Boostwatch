<?php $__env->startSection('title', 'Boost - '); ?>
<?php $__env->startSection('content'); ?>
    <div class="boost divFull">
        <div class="boost-box">
            <div class="boost-menu">
                <ul>
                    <a href="rating" id="<?php echo e((collect(request()->segments())->last() == 'rating' ? 'active' : '')); ?>"><li><?php echo app('translator')->getFromJson('boost.rating'); ?></li></a>


                    <!-- ยังไม่เปิด -->
                    <a style="opacity:0.3" id="<?php echo e((collect(request()->segments())->last() == 'duo' ? 'active' : '')); ?>"><li><?php echo app('translator')->getFromJson('boost.duo'); ?>&nbsp; <i class="fa fa-times" aria-hidden="true" style="color:red;"></i></li></a>

                    <!-- ยังไม่เปิด -->
                    <a style="opacity:0.3" id="<?php echo e((collect(request()->segments())->last() == 'placment' ? 'active' : '')); ?>"><li><?php echo app('translator')->getFromJson('boost.placment'); ?>&nbsp; <i class="fa fa-times" aria-hidden="true" style="color:red;"></i></li></a>


                    <a href="leveling" id="<?php echo e((collect(request()->segments())->last() == 'leveling' ? 'active' : '')); ?>"><li><?php echo app('translator')->getFromJson('boost.leveling'); ?></li></a>
                </ul>
            </div>
            <div class="boost-content">
                <?php echo $__env->yieldContent('boost-content'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
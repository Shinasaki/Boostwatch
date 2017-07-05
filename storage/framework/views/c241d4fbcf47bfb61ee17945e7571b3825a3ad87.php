<?php echo $__env->make('layouts._language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('boost-content'); ?>
    <div class="boost-rank">
        <form method="post">
            <div>
                <span><?php echo app('translator')->getFromJson('boost.current'); ?></span><br /><hr /><br />
                <input type="number" name="currentRank" class="currentRank" value="1700"/><br /><br /><hr /><br />
                <span class="boost-img1"><img src="<?php echo e(asset('image/rank/2.png')); ?>" /></span>
            </div>
            <div>
                <span><?php echo app('translator')->getFromJson('boost.new'); ?></span><br /><hr /><br />
                <input type="number" name="newRank" class="newRank" value="3000"/><br /><br /><hr /><br />
                <span class="boost-img2"><img src="<?php echo e(asset('image/rank/5.png')); ?>" /></span>
            </div>

            <div style="clear:both;">
                <span><?php echo app('translator')->getFromJson('boost.server'); ?></span><br /><hr /><br />
                <select name="server" class="server">
                    <option value="us"><?php echo app('translator')->getFromJson('boost.us'); ?></option>
                    <option value="eu"><?php echo app('translator')->getFromJson('boost.eu'); ?></option>
                    <option value="kr"><?php echo app('translator')->getFromJson('boost.kr'); ?></option>
                </select>

                <br /><br /><hr /><br />
            </div>
            <div>
                <span><?php echo app('translator')->getFromJson('boost.tag'); ?></span>
                <span id="tag-load"> <i class="fa fa-spinner fa-spin fa-fw" style="display:none;"></i></i></span>
                <br /><hr /><br />
                <input type="text" name="newRank" class="tag" placeholder="Name#1107"/><br /><br /><hr /><br />
            </div>

            <div style="clear:both;">
                <span><?php echo app('translator')->getFromJson('boost.pay'); ?></span><br /><hr /><br />
                <span id="button" class="checkout">
                    <span class="price">50</span>
                    <span ><?php echo app('translator')->getFromJson('boost.currency'); ?></span>
                </span>
                <br /><br /><hr /><br />
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boost.boost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
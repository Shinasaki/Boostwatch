<?php echo $__env->make('layouts._language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('boost-content'); ?>
    <div class="boost-rank">
        <div>
            <span><?php echo app('translator')->getFromJson('boost.current'); ?></span><br /><hr /><br />
            <input type="number" name="currentRank" value="1700"/><br /><br /><hr /><br />
            <span class="boost-img1"><img src="<?php echo e(asset('image/rank/2.png')); ?>" /></span>
        </div>
        <div>
            <span><?php echo app('translator')->getFromJson('boost.win'); ?></span><br /><hr /><br />
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"><br /><br /><hr /><br />
            <span class="boost-img2"><img src="<?php echo e(asset('image/rank/5.png')); ?>" /></span>
        </div>

        <div style="clear:both;">
            <span><?php echo app('translator')->getFromJson('boost.server'); ?></span><br /><hr /><br />
            <select>
                <option value="us"><?php echo app('translator')->getFromJson('boost.us'); ?></option>
                <option value="eu"><?php echo app('translator')->getFromJson('boost.eu'); ?></option>
                <option value="kr"><?php echo app('translator')->getFromJson('boost.kr'); ?></option>
            </select>

            <br /><br /><hr /><br />
        </div>
        <div>
            <span><?php echo app('translator')->getFromJson('boost.tag'); ?></span><br /><hr /><br />
            <input type="text" name="newRank" placeholder="Name#1107"/><br /><br /><hr /><br />
        </div>

        <div style="clear:both;">
            <span><?php echo app('translator')->getFromJson('boost.price'); ?></span><br /><hr /><br />
            <span class="price" id="button">40 Bath</span>
            <br /><br /><hr /><br />
        </div>
        <div>
            <span><?php echo app('translator')->getFromJson('boost.pay'); ?></span><br /><hr /><br />
            <input type="submit" id="button" value="Checkout">
            <br /><br /><hr /><br />
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boost.boost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
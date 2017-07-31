<div class="footer" style="clear:both;">
    <div>
        <ul>
            <!--<li>
                <span> Follow </span><hr />
                <ul>
                    <a href=""><li><i class="fa fa-facebook-square" aria-hidden="true"></i></li></a>
                    <a href=""><li><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
                    <a href=""><li><i class="fa fa-twitch" aria-hidden="true"></i></li></a>
                    <a href=""><li><i class="fa fa-btc" aria-hidden="true"></i></li></a>
                </ul>
            </li>-->
            <li>
                <ul>
                    <a href="support"><li><?php echo app('translator')->getFromJson('header.support'); ?></li></a>
                    <a href="login"><li><?php echo app('translator')->getFromJson('header.login'); ?></li></a>
                    <a href="register"><li><?php echo app('translator')->getFromJson('header.register'); ?></i></li></a>
                    <a href="jobs"><li><?php echo app('translator')->getFromJson('header.jobs'); ?></i></li></a>
                </ul>
                <a href="http://bwatch.pro"><img class="footer-logo" src="<?php echo e(asset('image/logo/boostwatch_text.png')); ?>" /></a><br />
                <span>Designed and developed by Peaches.</span><br />
                <span style="color:#565e76;">© 2017 Master & Dynamic. All rights reserved. Privacy Terms Site By Peaches.</span><br />
            </li>
        </ul>

    </div>
    <div style="background:#694892; width: 100%; height: 30px;"></div>
</div>

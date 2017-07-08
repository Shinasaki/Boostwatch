<div class="nav pc">
    <ul class="left">
        <li><a href="/" style="color:#fff">Boostwatch</a></li>
        <li><a href="/"><?php echo app('translator')->getFromJson('header.home'); ?></a></li>
        <li><a href="why"><?php echo app('translator')->getFromJson('header.why'); ?></a></li>
        <li><a href="review"><?php echo app('translator')->getFromJson('header.reviews'); ?></a></li>
    </ul>
    <ul class="right">
        <li id="pc"><a href="boost" id="highlight"><?php echo app('translator')->getFromJson('header.boost'); ?></a></li>
        <li class="dropdown" id="pc"><a><?php echo app('translator')->getFromJson('header.account'); ?><i class="fa fa-chevron-down"></i></a>
            <ul>
            <?php if(Auth::check()): ?>
                <li><a href="logout"><?php echo app('translator')->getFromJson('header.logout'); ?><i class="fa fa-sign-out"></i></a></li>
            <?php else: ?>
                <li><a href="login"><?php echo app('translator')->getFromJson('header.login'); ?><i class="fa fa-sign-in"></i></a></li>
                <li><a href="register"><?php echo app('translator')->getFromJson('header.register'); ?><i class="fa fa-key"></i></a></li>
            <?php endif; ?>
            </ul>
        </li>
    </ul>
</div>

<div class="nav mobile">
    <ul class="left">
        <li><a href="/" style="color:#fff">Boostwatch</a></li>
    </ul>
    <ul class="right">
        <li class="dropdown" id="pc"><a><?php echo app('translator')->getFromJson('header.menu'); ?><i class="fa fa-bars" aria-hidden="true"></i></i></a>
            <ul>
                <li><a href="login"><?php echo app('translator')->getFromJson('header.login'); ?><i class="fa fa-sign-in"></i></a></li>
                <li><a href="register"><?php echo app('translator')->getFromJson('header.register'); ?><i class="fa fa-key"></i></a></li>
                <li><a href="boost" style="color:orange;"><?php echo app('translator')->getFromJson('header.boost'); ?><i class="fa fa-fire"  aria-hidden="true"></i></a></li>
                <li><a href="why"><?php echo app('translator')->getFromJson('header.why'); ?><i class="fa fa-question" aria-hidden="true"></i></a></li>
                <li><a href="review"><?php echo app('translator')->getFromJson('header.reviews'); ?><i class="fa fa-quote-right" aria-hidden="true"></i></a></li>
            </ul>
        </li>
    </ul>
</div>

<!DOCTYPE html>

<script type="text/javascript">
      var base_url = '<?php echo e(url('/')); ?>';
</script>


<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="google" content="notranslate" />
        <meta name="description" content="<?php echo app('translator')->getFromJson('meta.description'); ?>" />
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- TITLE -->
        <title><?php echo $__env->yieldContent('title'); ?>Boostwatch</title>


        <!-- Style -->
        <?php echo e(HTML::style('css/jquery-ui.css')); ?>

        <?php echo e(HTML::style('css/layout.css')); ?>

        <?php echo e(HTML::style('css/scroll.css')); ?>

        <?php echo e(HTML::style('css/boost.css')); ?>

        <?php echo e(HTML::style('css/payment.css')); ?>

        <?php echo e(HTML::style('css/dashboard.css')); ?>



        <!-- JS -->
        <?php echo e(HTML::script('js/jquery.js')); ?>

        <?php echo e(HTML::script('js/jquery-ui.js')); ?>

        <?php echo e(HTML::script('js/screen.js')); ?>

        <?php echo e(HTML::script('js/layout.js')); ?>

        <?php echo e(HTML::script('js/boost.js')); ?>

        <?php echo e(HTML::script('js/dashboard.js')); ?>



    </head>

    <!-- Body -->
    <body>
        <div style="z-index:5;position:fixed;bottom:10px;right:10px;">
            <button onclick="doorOpen()">Open</button>
            <button onclick="doorClose()" >Close</button>
            <button onclick="popup_open()">Popup Open</button>
            <button onclick="popup_close()" >Popup Close</button>
        </div>
        <?php echo $__env->make('layouts._animate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts._popup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts._basket', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <?php echo $__env->make('layouts._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>


    </body>
</html>

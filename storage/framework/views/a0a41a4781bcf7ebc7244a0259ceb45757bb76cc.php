<?php echo $__env->make('layouts._language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('boost-content'); ?>
    Duo
    <style>
        #custom-handle {
        width: 3em;
        height: 1.6em;
        top: 50%;
        margin-top: -.8em;
        text-align: center;
        line-height: 1.6em;
        background: #444444;
        }
        .ui-draggable, .ui-droppable {
	background-position: top;
}
    </style>
    <script>
         $( function() {
           var handle = $( "#custom-handle" );
           $( "#slider" ).slider({
             create: function() {
               handle.text( $( this ).slider( "value" ) );
             },
             slide: function( event, ui ) {
               handle.text( ui.value );
             }
           });
         } );
    </script>
    <div id="slider">
        <div id="custom-handle" class="ui-slider-handle"></div>
    </div>
    <?php echo app('translator')->getFromJson('header.home'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boost.boost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
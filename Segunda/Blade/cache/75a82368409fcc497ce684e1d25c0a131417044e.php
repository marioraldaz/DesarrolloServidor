<html>
    <head>
        <title>App Name - <?php echo $__env->yieldContent('titulo'); ?></title>
    </head>
    <body>
        <?php $__env->startSection('encabezado'); ?>
            This is the master sidebar.
        <?php echo $__env->yieldSection(); ?>
 
        <div class="container">
            <?php echo $__env->yieldContent('contenido'); ?>
        </div>
    </body>
</html><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/layout.blade.php ENDPATH**/ ?>
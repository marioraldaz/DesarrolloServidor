<?php $__env->startSection('titulo','titulo por defecto'); ?>


<?php $__env->startSection('contenido','contenido por defecto'); ?>
    <?php $__currentLoopData = ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/viewSales.blade.php ENDPATH**/ ?>
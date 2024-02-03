<?php $__env->startSection('titulo','titulo por defecto'); ?>


<?php $__env->startSection('contenido'); ?>
    <a href="./gestionarCustomers">Go Back</a>
    <a href="./index">Go To Main Page</a>

    <?php if(count($sales)>0): ?>

    <?php else: ?>
        <h1>No Se Han Encontrado Ventas Asociadas A Este Usuario</h1>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/viewCustomerSales.blade.php ENDPATH**/ ?>
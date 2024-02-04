<?php $__env->startSection('titulo', 'titulo por defecto'); ?>

<?php $__env->startSection('contenido'); ?>
    <form method="POST" action="">
        <a href="./insertarCustomer">Insertar Customer</a>
        <a href="./">Go Back</a>
        <?php if(count($customers) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <?php $__currentLoopData = $customers[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($key); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $params): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $__currentLoopData = $params; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e(htmlspecialchars($value)); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <a href="seeCustomerSales.php?id=<?php echo e($params['id']); ?>">See Sales</a>
                                <a href="seeBorrowedBooks.php?id=<?php echo e($params['id']); ?>">See Borrowed Books</a>
                                <a href="modifyCustomer.php?id=<?php echo e($params['id']); ?>">Modify</a>
                                <button type='submit' name='deleteCustomer' value=<?php echo e($params['id']); ?>>Delete
                                    Customer</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <h1>No customers in DataBase</h1>
        <?php endif; ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/viewCustomers.blade.php ENDPATH**/ ?>
<?php $__env->startSection('titulo','titulo por defecto'); ?>

<?php $__env->startSection('contenido'); ?>
    <form method="POST" action="">
        <a href="./insertarCustomer">Insertar Customer</button>
        <a href="./">Go Back</a>
        <?php if(count($customersInDB)>0): ?>
            <table>
                <thead>
                    <tr>
                        <?php $__currentLoopData = $customersInDB[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($key); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customersInDB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $params): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $__currentLoopData = $params; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e(htmlspecialchars($value)); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <button type="submit" name="seeSales" value="<?php echo e($params['id']); ?>">See Sales</button>
                                <button type="submit" name="seeBorrowedBooks" value="<?php echo e($params['id']); ?>">See Borrowed Books</button>
                                <button type="submit" name="modifyCustomer" value="<?php echo e($params['id']); ?>">Modify</button>
                                <button type="submit" name="deleteCustomer" value="<?php echo e($params['id']); ?>">Delete</button>
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
<?php $__env->startSection('titulo', 'Update Customer'); ?>

<?php $__env->startSection('contenido'); ?>
    <a href="./index">Go To Main Page</a>
    <a href="./gestionarCustomers">Go Back</a>

    <form method="post" action="">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo e($customer['firstname']); ?>" required>
        <br>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?php echo e($customer['surname']); ?>" required>
        <br>

        <label for="newEmail">Email:</label>
        <input type="email" name="newEmail" value="<?php echo e($customer['email']); ?>" required>
        <br>

        <label for="type">Type:</label>
        <select name="type" required>
            <option value="basic" <?php echo e($customer['type'] == 'basic' ? 'selected' : ''); ?>>basic</option>
            <option value="premium" <?php echo e($customer['type'] == 'premium' ? 'selected' : ''); ?>>Premium</option>
        </select>
        <br>

        <button type="submit" name="updateCustomer" value="<?php echo e($customer['id']); ?>">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/viewModifyCustomer.blade.php ENDPATH**/ ?>
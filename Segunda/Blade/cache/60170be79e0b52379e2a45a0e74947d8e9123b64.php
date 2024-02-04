<?php $__env->startSection('titulo'); ?>
<?php $__env->startSection('contenido'); ?>
    <a href="./index">Go To Main Page</a>
    <a href="./gestionarBooks">Go Back</a>
    <form method="post" action="">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" value="<?php echo e($book['isbn']); ?>" required>
        <br>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo e($book['title']); ?>" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" name="author" value="<?php echo e($book['author']); ?>" required>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo e($book['stock']); ?>" required>
        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo e($book['price']); ?>" required>
        <br>

        <button type="submit" name="updateBook" value="<?php echo e($book['id']); ?>">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\mio\DesarrolloServidor\Segunda\Blade\views/viewModifyBook.blade.php ENDPATH**/ ?>
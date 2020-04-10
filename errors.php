<?php if (count($errors) > 0) : ?>
    <div>
        <?php foreach ($errors as $error) : ?>
            <span class="badge badge-danger"><?php echo $error ?></span>
        <?php endforeach ?>

    </div>


<?php endif ?>
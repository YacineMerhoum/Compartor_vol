<?php if (!empty($_GET['success'])) {?>
    <div class="text-green-500 text-xl italic font-bold m-2" style="font-family: Georgia, 'Times New Roman', Times, serif;" role="alert">
        <?= $_GET['success'] ?>
    </div>
<?php } ?>

<?php if (!empty($_GET['error'])) {?>
    <div class="text-red-500 text-xl text font-extrabold m-2" role="alert">
        <?= $_GET['error'] ?>
    </div>
<?php } ?>
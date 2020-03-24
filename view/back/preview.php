<?php require_once('./view/templates/header.php') ?>

<!-- preview new articles page-->
<div id="preview_container">
    <div id="preview">
        <h3><?= $_POST['title'];?></h3>
        <br/>
        <p><?= $_POST['content'];?> </p>
    </div>
    <div>
        <a href="/dashboard" class="btn-success btn" role="button"> retour à l'administration</a>
    </div>
</div>

<?php require_once('./view/templates/footer.php'); ?>
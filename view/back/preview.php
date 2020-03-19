<?php require_once('./view/templates/header.php') ?>

<div id="preview_container">
    <div id="preview">
        <h3><?= $_POST['title'];?></h3>
        <br/>
        <p><?= $_POST['content'];?> </p>
    </div>
    <div>
        <a href="/dashboard"><button class="btn-success"> retour à l'administration</button></a>
    </div>
</div>

<?php require_once('./view/templates/footer.php'); ?>
<?php 

require_once('./view/templates/header.php') ?>

<div>
    <h3><?= $_POST['title'];?></h3>
    <br/>
    <p><?= $_POST['content'];?> </p>
</div>
<div>
    <a href="/dashboard"><button>retour à l'administration</button></a>
</div>


<?php require_once('./view/templates/footer.php'); ?>
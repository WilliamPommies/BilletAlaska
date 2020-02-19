<?php 
require_once './view/templates/header.php'; 
?>

<h1>Connectez-vous</h1>

<form method="post" action="verify">
    Identifiant : <input type="text" name="user"><br>
    Mot de Passe : <input type="password" name="password"><br/>
    <input type="submit" value="OK">
</form>

<?php

require_once './view/templates/footer.php';
?>
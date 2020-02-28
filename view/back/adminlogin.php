<?php 
require_once './view/templates/header.php'; 
?>

<h1>Connectez-vous</h1>

<form name="login-form" method="post" action="/dashboard">
    <input type="hidden" name="login_checker" value="loginForm">
    <input type="text" name="user" value="" placeholder="Identifiant" required><br>
    <input type="password" name="password" value="" placeholder="Mot de Passe" required><br/>
    <input type="submit" name="Valider" value="Se connecter">
</form>

<?php

require_once './view/templates/footer.php';
?>
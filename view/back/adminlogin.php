<?php 
require_once './view/templates/header.php'; 
?>

<div>
    <h1>Connectez-vous</h1>
    <form name="login-form" method="post" action="/dashboard">
        <input type="hidden" name="login_checker" value="loginForm">
        <input type="text" name="username" value="" placeholder="Identifiant" pattern="^[A-Za-z0-9_-]*$" required><br>
        <input type="password" name="password" value="" placeholder="Mot de Passe" required><br/>
        <input class="btn-success" type="submit" name="Valider" value="Se connecter">
    </form>
</div>
<?php

require_once './view/templates/footer.php';
?>
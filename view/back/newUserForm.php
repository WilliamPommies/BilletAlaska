<?php require("./view/templates/header.php"); ?>

<div id="new_container">
    <form name="newArticleform" action="/create/user/insert" method="post"> 
        <input type="hidden" name="form_checker" value="newUserForm">
        <input type="text" name="username" value="" placeholder="username" required>
        <br>
        <input type="password" name="password" value="" placeholder="password" required>
        <br>
        <input type="submit" name="valider" value="Créer">
    </form>
</div>


<?php require("./view/templates/footer.php"); ?>
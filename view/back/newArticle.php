<?php require("./view/templates/header.php"); ?>

<div id="new_container">
    <form name="newArticleform" action="/save/newArticle" method="post"> 
        <input type="hidden" name="form_checker" value="newArticleForm">
        <input type="text" name="title" value="" placeholder="Titre" required>
        <br>
        <textarea id="mytextarea" name="content" required>
        Exprimez-vous !
        </textarea>
        <br>
        <input type="submit" name="valider" value="Poster">
    </form>
</div>


<?php require("./view/templates/footer.php"); ?>
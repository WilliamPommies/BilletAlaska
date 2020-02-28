<?php require_once('./view/templates/header.php'); ?>

<form name="newArticleform" action="/save/newArticle" method="post"> 
    <input type="hidden" name="form_checker" value="newArticleForm">
    <input type="text" name="title" value="" placeholder="Titre" required>
    <br>
    <textarea id="mytextarea" name="content" required>
      Hello, World!
    </textarea>
    <br>
    <input type="submit" name="valider" value="Poster">
</form>

<?php require_once('./view/templates/footer.php'); ?>
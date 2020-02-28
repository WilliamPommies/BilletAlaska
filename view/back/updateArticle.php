<?php require_once('./view/templates/header.php'); 

$articleId = $displayArticle[0];
$articleTitle = $displayArticle[1];
$articleContent = $displayArticle[2];
?>

<div class="articleForm">
    <form name="newArticleform" action=<?= "/article/update?id=". $articleId ?> method="post"> 
        <input type="hidden" name="form_checker" value="updateForm">
        <input type="text" name="title" value="<?=$articleTitle?>" placeholder="" required>
        <br>
        <textarea id="mytextarea" name="content" required>
            <?=$articleContent?>
        </textarea>
        <br>
        <input type="submit" name="valider" value="Modifier">
    </form>
</div>


<?php require_once('./view/templates/footer.php'); ?>
<?php require_once('./view/templates/header.php'); 

//fetch all information of article
$articleId = $displayArticle[0];
$articleTitle = $displayArticle[1];
$articleContent = $displayArticle[2];
?>

<!-- update article form-->
<div class="articleForm">
    <form name="newArticleform" action=<?= "/article/update?id=". $articleId ?> method="post"> 
        <input type="hidden" name="form_checker" value="updateForm">
        <input type="text" name="title" value="<?=$articleTitle?>" placeholder="" required>
        <br>
        <textarea id="mytextarea" name="content" required>
            <?=$articleContent?>
        </textarea>
        <br>
        <input class="btn-success" type="submit" name="valider" value="Modifier">
    </form>
</div>


<?php require_once('./view/templates/footer.php'); ?>
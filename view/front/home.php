
<?php require_once('./view/templates/header.php'); ?>

<div id='lastArticle'>
    <h1>Dernier Chapitre</h1>
    <h3><?= $lastArticle['title']; ?></h3>
    <p><?= substr(strip_tags($lastArticle['content']),0,400)?>...</p>
    <a href="<?= "/chapitre?id=" . $lastArticleId ?>"><button class='btn-primary'>Lire plus</button></a>
</div>
<br>
<div id='allArticles'>
    <h1>Tous les Chapitres</h1>
    <div id="flex-container">
    <?php
    while ($article = $articles->fetch())
    {
     $articleId = $article[0];
     $articleTitle = $article[1];
     $articleContent = $article[2];
     ?>
        <div class="chapters">
            <h3><?= $articleTitle ?></h3>
            <p><?= substr(strip_tags($articleContent),0,200)?> ... </p>
            <a href="<?= "/chapitre?id=" . $articleId ?>"><button class="btn-primary">lire la suite</button></a>
        </div>
      
    <?php } ?>
    </div>
</div> 

<?php require_once('./view/templates/footer.php'); ?>

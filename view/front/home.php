
<?php require('./view/templates/header.php'); ?>
<div id='lastArticle'>
    <h1>Dernier Article</h1>
    <h3><?php echo $lastArticle['title']; ?></h3>
    <p><?php echo substr(strip_tags($lastArticle['content']),0,400)?>...</p>
    <a href="<?php echo "/chapitre?id=" . $lastArticleId ?>"><button class='btn-primary'>Lire plus</button></a>
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
            <h3><?php echo $articleTitle ?></h3>
            <p><?php echo substr(strip_tags($articleContent),0,200)?> ... </p>
            <a href="<?php echo "/chapitre?id=" . $articleId ?>"><button class="btn-primary">lire la suite</button></a>
        </div>
      
    <?php } ?>
    </div>
</div> 
<?php require('./view/templates/footer.php'); ?>

<?php require_once('./view/templates/header.php'); ?>

    <div>
        <h2>Commentaires en attentede modération</h2>
        <?php while ($reportedComment = $reportedComments->fetch())
        {
            $commentAuthor = $reportedComment[1];
            $commentContent = $reportedComment[2];
        ?>
        <div>
            <h4>Commentaire de <?php echo $commentAuthor ?></h4>
            <p><?php echo $commentContent ?></p>
        </div>

        <?php } ?>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <div>
    <h2>Tous les articles</h2>
    <?php while ($article = $articles->fetch())
    {
     $articleId = $article[0];
     $articleTitle = $article[1];
     $articleContent = $article[2];
     ?>
        <div class="chaptersdash">
            <h3><?php echo $articleTitle ?></h3>
            <p><?php echo substr(strip_tags($articleContent),0,200)?> ... </p>
            <a href="<?php echo "/chapitre?id=" . $articleId ?>"><button class="btn-primary">voir</button></a>
            <a href="<?php echo "/admin/modifier?id=" . $articleId ?>"><button class="btn-primary">modifier</button></a>
            <a href="<?php //echo "/index.php" ?>"><button class="btn-primary">supprimer</button></a>
        </div>
      
    <?php } ?>
    </div>
   
    <?php require_once('./view/templates/header.php'); ?>
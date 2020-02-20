<?php require_once('./view/templates/header.php');

     $articleId = $displayArticle[0];
     $articleTitle = $displayArticle[1];
     $articleContent = $displayArticle[2];
     ?>
    <div>
        <h3><?php echo $articleTitle;?></h3>
        <br/>
        <p><?php echo $articleContent;?> </p>
    </div>

    <form action="index.php?action=addComment&amp;id=<?= $articleId ?>" method="post">
         <label for="username">Pseudo :</label>
         <input type="text" name="username" value="" required>
         <br>
         <label for="comment">Commentaire :</label>
         <textarea name="comment" rows="3" cols="20" required></textarea>
         <br>
         <input type="submit" name="valider" value="Ajouter le commentaire">
    </form>

    
    <div id="comment_section">
        <?php
            while ($comment = $comments->fetch())
            {
                $commentPseudo = htmlspecialchars($comment[1]);
                $commentContent = htmlspecialchars($comment[2]);
                $commentId = $comment[0];
            ?>
            <div class="comment">
                <h4>Commentaire de <?= $commentPseudo ?></h4>
                <p><?= $commentContent ?></p>
                <a href="index.php?action=signalComment&amp;id=<?= $commentId ?>&amp;articleId=<?= $articleId ?>">Signaler</a>
            </div>
            <?php
            }
            $comments->closeCursor()
        ?>
    </div>
</div>
<?php require_once('./view/templates/footer.php'); ?>

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

    <form name="comment-form" action="/chapitre?id=<?= $articleId ?>" method="post">
        <input type="hidden" name="form_checker" value="commentForm">
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
                if($comment[4] == 0){
                ?>
                <div class="comment">
                    <h4>Commentaire de <?= $commentPseudo ?></h4>
                    <p id="comment-content"><?= $commentContent ?></p>
                    <button id="report-btn" onclick="reportComment(<?= $commentId ?>)">signaler</button>
                </div>
                <?php
                } elseif($comment[4] == 1){
                ?>
                <div class="comment">
                    <h4>Commentaire de <?= $commentPseudo ?></h4>
                    <p>Ce commentaire est en attente de modération</p>
                </div>
                <?php
                }
            }
            $comments->closeCursor()
        ?>
    </div>
</div>
<script type="text/javascript">
    async function reportComment(commentId){
        let response = await axios.get("/comments/report?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            let signaledComment = "Ce commentaire est désormais en attente de modération. Merci de votre retour."
            document.getElementById('comment-content').innerText = signaledComment
            document.getElementById('comment-content').style.color = 'red'
            document.getElementById("report-btn").style.display = 'none'
        }
    } 
</script>
<?php require_once('./view/templates/footer.php'); ?>

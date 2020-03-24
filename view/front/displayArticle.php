<?php require_once('./view/templates/header.php');

     $articleId = $displayArticle[0];
     $articleTitle = $displayArticle[1];
     $articleContent = $displayArticle[2];
     ?>
    <div id="chapter_display">
        <h3><?= $articleTitle;?></h3>
        <h4 id="author"><em>Ecrit par <?= $authorUsername[0] ?></em></h4>
        <br/>
        <p><?= $articleContent;?> </p>
    </div>
    
    <!--comment form -->
    <div id="comment_section">
        <form name="comment-form" action="/chapitre?id=<?= $articleId ?>" method="post"> 
            <input type="hidden" name="form_checker" value="commentForm">
            <input id="commentUser"type="text" name="username" value="" placeholder="Pseudo" rows="1" cols="60" required>
            <br>
            <textarea id="CommentText" name="comment" placeholder="Votre commentaire" rows="3" required></textarea>
            <br>
            <input class="btn-primary" type="submit" name="valider" value="Ajouter le commentaire">
        </form>
        <?php
            //fetch existing comments
            while ($comment = $comments->fetch())
            {
            $commentPseudo = htmlspecialchars($comment[1]);
            $commentContent = htmlspecialchars($comment[2]);
            $commentId = $comment[0];
                if($comment[4] == 0){
                ?>
                <div class="comment" id="comment-<?= $commentId ?>">
                    <h4>Commentaire de <?= $commentPseudo ?></h4>
                    <p class="comment-content"><?= $commentContent ?></p>
                    <button class="btn-outline-danger report-btn" onclick="reportComment(<?= $commentId ?>)">signaler</button>
                </div>
                <?php
                // if comment is reported display a special message
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
            let commentContent = document.querySelector(`#comment-${commentId} .comment-content`)
            let reportButton = document.querySelector(`#comment-${commentId} .report-btn`)
            commentContent.innerText = signaledComment
            commentContent.style.color = 'red'
            reportButton.style.display = 'none'
        }
    } 
</script>
<?php require_once('./view/templates/footer.php'); ?>

<?php require_once('./view/templates/header.php'); ?>

<div id="commentToModerate">
    <h2>Commentaires en attente de modération</h2>
    <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
    <?php while($modComment = $modComments->fetch()){
        $commentId = $modComment[0];
        $commentAuthor = htmlspecialchars($modComment[1]);
        $commentContent = htmlspecialchars($modComment[2]);
        $articleId = $modComment[3]
        ?>
            <tbody>
                <tr>
                    <td><?= $commentAuthor ?></td>
                    <td><?= $commentContent ?></td>
                    <td><button class="btn-success btn" id="allow-btn" onclick="allowComment(<?= $commentId ?>)">Autoriser</button></td>
                    <td><button class="btn-danger btn" id="delete-btn" onclick="deleteComment(<?= $commentId ?>)">Supprimer</button></td>
                    <td><a href="<?php echo "/chapitre?id=" . $articleId ?>"><button class="btn-primary btn">Voir l'article</button></a></td>
                </tr>
            </tbody>
    <?php } ?>
    </table>
</div>
<div>
    <a href="/create/new"><button>Créer nouveau</button></a>
</div>

<div id="allChaptersDash">
    <h2>Tous les articles</h2>
    <?php 
    while ($article = $articles->fetch())
    {
     $articleId = $article[0];
     $articleTitle = $article[1];
     $articleContent = $article[2];
     ?>
        <div class="chaptersdash">
            <h2><?php echo $articleTitle ?></h2>
            <p><?php echo substr(strip_tags($articleContent),0,100)?> ... </p>
            <a href="<?php echo "/chapitre?id=" . $articleId ?>"><button class="btn-primary">lire la suite</button></a>
        </div>
      
    <?php } ?>
</div>
<script type="text/javascript">
    async function allowComment(commentId){
        let response = await axios.get("/comments/allow?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            alert("commentaire autorisé")
        }
    } 
    async function deleteComment(commentId){
        let response = await axios.get("/comments/delete?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            alert("commentaire supprimé")
        }
    } 
</script>

<?php require_once('./view/templates/header.php'); ?>
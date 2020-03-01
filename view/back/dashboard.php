<?php require_once('./view/templates/header.php'); ?>

<section>
    <div class="title">
        <h1>Modération</h1>
    </div>
    <div id="commentToModerate">
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
                    <tr id="commentContent<?=$commentId?>">
                        <td><?= $commentAuthor ?></td>
                        <td><?= $commentContent ?></td>
                        <td><button class="btn-outline-success btn" id="allow-btn" onclick="allowComment(<?= $commentId ?>)">Autoriser</button></td>
                        <td><button class="btn-outline-danger btn" id="delete-btn" onclick="deleteComment(<?= $commentId ?>)">Supprimer</button></td>
                        <td><a href="<?= "/chapitre?id=" . $articleId ?>"><button class="btn-outline-primary btn">Voir l'article</button></a></td>
                    </tr>
                </tbody>
        <?php } ?>
        </table>
    </div>
</section>

<section>
    <div class="title">
        <h1>Tous les articles</h1>
        <a href="/create/new"><button class="btn-outline-secondary">Créer nouveau</button></a>
    </div>
    <div id="allChaptersDash">
    <?php 
    while ($article = $articles->fetch())
    {
        $articleId = $article[0];
        $articleTitle = $article[1];
        $articleContent = $article[2];
        ?>
        <div id="chaptersdash<?=$articleId?>">
            <h2><?= $articleTitle ?></h2>
            <p><?= substr(strip_tags($articleContent),0,100)?> ... </p>
            <div class="btn-container">
                <a href="<?= "/chapitre?id=" . $articleId ?>"><button class="btn btn-outline-primary">lire la suite</button></a>
                <a href=<?= "/article/modify?id=" . $articleId ?>><button class="btn-outline-warning btn" id="update-btn">Modifier</button></a>
                <a><button class="btn-outline-danger btn" id="delete-btn" onclick="deleteArticle(<?= $articleId ?>)">Supprimer</button></a>
            </div>
        </div>
    <?php } ?>
    </div>
</section>

<script type="text/javascript">
    async function allowComment(commentId){
        let response = await axios.get("/comments/allow?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            //alert("Le commentaire a été autorisé")
            let allowedComment = document.getElementById('commentContent' + commentId)
            allowedComment.innerHTML = ""
        }
    } 
    async function deleteComment(commentId){
        let response = await axios.get("/comments/delete?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            //alert("Le commentaire a bien été supprimé")
            let deletedComment = document.getElementById('commentContent' + commentId)
            deletedComment.innerHTML = ""
        }
    } 

    async function deleteArticle(articleId)
    {
        let response = await axios.get("/article/delete?id=" + articleId)
        if(response.status >= 200 && response.status < 400){
            //alert("article supprimé")
            let deletedArticle = document.getElementById("chaptersdash"+articleId)
            deletedArticle.innerHTML=""
        }
    }
</script>

<?php require_once('./view/templates/header.php'); ?>
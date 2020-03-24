<?php require_once('./view/templates/header.php'); ?>

<!-- Comments to moderate section-->
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
                <!-- fetch all comments to moderate - loop -->
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
                        <td><a href="<?= "/chapitre?id=" . $articleId ?>" class="btn-outline-primary btn" role=button>Lire</a></td>
                    </tr>
                </tbody>
        <?php } ?>
        </table>
    </div>
</section>

<!-- Display all chapters order by most recent to oldest -->
<section>
    <div class="title">
        <h1>Tous les articles</h1>
        <a href="/create/new">Créer nouveau</a>
        <a href="/create/user">Ajouter un utilisateur</a>
    </div>
    <div id="allChaptersDash">
    <!-- loop to fetch all articles -->
    <?php 
    while ($article = $articles->fetch())
    {
        $articleId = $article[0];
        $articleTitle = $article[1];
        $articleContent = $article[2];
        ?>
        <div id="chaptersdash<?=$articleId?>" class="chapter_view">
            <h2><?= $articleTitle ?></h2>
            <p><?= substr(strip_tags($articleContent),0,100)?> ... </p>
            <div class="btn-container">
                <a href="<?= "/chapitre?id=" . $articleId ?>" class="btn btn-outline-primary" role="button">Lire</a>
                <a href=<?= "/article/modify?id=" . $articleId ?> class="btn-outline-warning btn" role="button">Modifier</a>
                <button class="btn-outline-danger btn" id="delete-btn" onclick="deleteArticle(<?= $articleId ?>)">Supprimer</button>
            </div>
        </div>
    <?php } ?>
    </div>
</section>

<script type="text/javascript">
    async function allowComment(commentId){
        let response = await axios.get("/comments/allow?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            let allowedComment = document.getElementById('commentContent' + commentId)
            allowedComment.innerHTML = ""
        }
    } 
    async function deleteComment(commentId){
        let response = await axios.get("/comments/delete?id=" + commentId)
        if(response.status >= 200 && response.status < 400){
            let deletedComment = document.getElementById('commentContent' + commentId)
            deletedComment.innerHTML = ""
        }
    } 

    async function deleteArticle(articleId)
    {
        let response = await axios.get("/article/delete?id=" + articleId)
        if(response.status >= 200 && response.status < 400){
            let deletedArticle = document.getElementById("chaptersdash"+articleId)
            deletedArticle.innerHTML=""
        }
    }
</script>

<?php require_once('./view/templates/header.php'); ?>
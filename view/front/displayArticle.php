<?php require('./view/templates/header.php');

     $articleId = $displayArticle[0];
     $articleTitle = $displayArticle[1];
     $articleContent = $displayArticle[2];
     ?>
        <div>
            <h3><?php echo $articleTitle;?></h3>
            <p><?php echo $articleContent;?> </p>
        </div>
    </div>
</div>
<?php require('./view/templates/footer.php'); ?>

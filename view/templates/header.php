<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Billets d'Alaska</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/hffvymj4ee1g6b15g9osarycp749nlbkg7211z25d6yiuwjk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea'
        });
    </script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info"> 
        <a class="navbar-brand">Billets d'Alaska</a>
        <?php if($_SESSION == true && $_SESSION['statut'] == 'admin'){ 
            ?> <a href="/dashboard" class="navbar-brand">Dashboard</a>
        <?php } ?>
        <a href="/" class="navbar-brand"> Home</a>
        <?php 
            if($_SESSION == true && $_SESSION["statut"] == "admin"){
                ?>
                    <a href="/disconnect" class="navbar-brand">déconnecter</a>
                <?php
            } else {
                ?>
                    <a href="/login" class="navbar-brand">se connecter</a>
                <?php 
            }
        ?>

        
    </nav>

    <div class="container mt-4">
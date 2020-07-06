<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="html/css; charset=utf-8" />
        <title>Page d'administration - Blog</title> <!-- Page pour l'administration du site (accessible uniquement par l'administrateur) -->
        <link rel="stylesheet" href="blog.css">
    </head>

<body>
<section id="image-fond1">
<?php include("header.php"); ?>
<main>
	<section class="text2">
    <h1 class="welcome2">Administration du site</h1>

    <?php

//On vérifie que l'utilisateur est bien l'admin
if ($_SESSION['id_droit']!=1337)
{
    header("Location: index.php"); //l'utilisateur est redirigé vers la page d'accueil
    exit();
}
else
{
    //Modification/suppression d'articles
    $connect= mysqli_connect('localhost','root','','blog');
    $requete_art="SELECT * FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ORDER by date DESC";
    $query=mysqli_query($connect,$requete_art);
    $articles=mysqli_fetch_all($query);
?>

<h2 class="voir-articles2">Liste des articles</h2>

<table class='tableau_admin'>
    <thead>
        <th class="titre-2">Article</th>
        <th class="titre-3">Utilisateur</th>
        <th class="titre-4">Action</th>
    </thead>
    <tbody>
    <?php foreach($articles as $article) { ?>
        <tr>
        <td class="the-article"><?php echo $article[1] ; ?> </td>
        <td class="the-utilisateur"><?php echo $article[8] ; ?> </td>
        <td class="the-action"><form method="post" action="admin.php" id="suppression"><button type="submit" id="submit" name="article_<?php echo $article[0]; ?>">Supprimer l'article</button></form></td>
        </tr>
        <?php 
            if (isset($_POST["article_"."$article[0]"]))
            {
                $connect= mysqli_connect('localhost','root','','blog');
                $suppr="DELETE FROM articles WHERE id=$article[0]";
                $result=mysqli_query($connect,$suppr);
                mysqli_close($connect);
                unset($_POST);
            }    
        } ?>
    </tbody>
</table>

<h2 class="voir-articles6">Liste des utilisateurs</h2>

<?php
    //Modification/suppression des utilisateurs
    $connect= mysqli_connect('localhost','root','','blog');
    $requete="SELECT * FROM utilisateurs INNER JOIN droits ON utilisateurs.id_droits = droits.id " ;
    $query=mysqli_query($connect,$requete);
    $utilisateurs=mysqli_fetch_all($query);
    mysqli_close($connect);

    ?>

    <table class='tableau_admin'>
    <thead>
        <th class="titre-3">Login</th>
        <th class="titre-3">Droits</th>
        <th class="titre-4" colspan=2>Actions</th>
    </thead>
    <tbody>
    <?php foreach($utilisateurs as $utilisateur) { ?>
        <tr>
        <td class="the-utilisateur"><?php echo $utilisateur[1] ; ?> </td>
        <td class="the-utilisateur"><?php echo $utilisateur[6] ; ?> </td>
        <td><form method="post" action="admin.php" id="articles"><button type="submit" id="utilisateur" name="utilisateur_<?php echo $utilisateur[0]; ?>">Supprimer l'utilisateur</button></form></td>
        <td class="le-select"><form method="post" action="admin.php"><select name="droit" id="droit"><option value="">Modifier droits</option><option value="1">Utilisateur</option><option value="42">Modérateur</option><option value="1337">Administrateur</option></select><input type="submit" id="submit2" name="droit_utilisateur_<?php echo $utilisateur[0]; ?>"></form></td>
        </tr>
        <?php 
            if (isset($_POST["utilisateur_"."$utilisateur[0]"]))
            {
                $connect= mysqli_connect('localhost','root','','blog');
                $suppr="DELETE articles,commentaires,utilisateurs FROM utilisateurs LEFT JOIN articles ON (utilisateurs.id=articles.id_utilisateur) LEFT JOIN commentaires ON (utilisateurs.id=commentaires.id_utilisateur) WHERE utilisateurs.id=$utilisateur[0]";
                $result=mysqli_query($connect,$suppr);
                unset($_POST);
                mysqli_close($connect);
            }
            
            if (isset($_POST["droit_utilisateur_"."$utilisateur[0]"]))
            {
                $id_droits=$_POST['droit'];
                $connect= mysqli_connect('localhost','root','','blog');
                $update="UPDATE utilisateurs SET id_droits = \"$id_droits\" WHERE utilisateurs.id = $utilisateur[0] ";
                $result=mysqli_query($connect,$update);
                unset($_POST);
                mysqli_close($connect);
            }
        } ?>
    </tbody>
</table>

<h2 class="voir-articles6">Liste des catégories</h2>

<?php
    //Modification des catégories
    $connect= mysqli_connect('localhost','root','','blog');
    $requete="SELECT * FROM categories" ;
    $query=mysqli_query($connect,$requete);
    $categories=mysqli_fetch_all($query);
    mysqli_close($connect);

    ?>

    <table class='tableau_admin'>
    <thead>
        <th class="titre-3">Nom</th>
        <th class="titre-4" colspan=2>Actions</th>
    </thead>
    <tbody>
    <?php foreach($categories as $categorie) { ?>
        <tr class="all-utilisateur">
        <td class="the-utilisateur"><?php echo $categorie[1] ; ?> </td>
        <td><form method="post" action="admin.php"><input name="modif_categorie" id="modif_categorie" type="text" placeholder="Modification nom catégorie" required ><input type="submit" id="submit5" name="modif_categorie_<?php echo $categorie[0]; ?>"></form></td>
        </tr>
        <?php 

            
            if (isset($_POST["modif_categorie_"."$categorie[0]"]))
            {
                $modif_categorie=$_POST["modif_categorie"];
                $connect= mysqli_connect('localhost','root','','blog');
                $update="UPDATE categories SET nom = \"$modif_categorie\" WHERE categories.id = $categorie[0] ";
                $result=mysqli_query($connect,$update);
                unset($_POST);
                mysqli_close($connect);
            }
        } ?>
    </tbody>
</table>
<?php

    //Ajout d'une catégorie
?>


        <form method="post" action="admin.php" id="ajout_categorie"><label for="ajout_categorie"><h2 class="welcome3">Ajouter une catégorie</h2></label><input name="nvelle_categorie" id="modif_categorie" type="text" placeholder="Nouvelle catégorie" required><input type="submit" class="bouton2" name="ajout_categorie"></form>

        <?php
            if (isset($_POST["nvelle_categorie"]))
            {
                $ajout_categorie=$_POST["nvelle_categorie"];
                $connect= mysqli_connect('localhost','root','','blog');
                $ajout="INSERT INTO categories (id,nom) VALUES (NULL, \"$ajout_categorie\")";
                $result=mysqli_query($connect,$ajout);
                mysqli_close($connect);
            }
}
unset($_POST);


?>
</main>
</section>
</section>
<?php include("footer.php"); ?>
</body>
</html>
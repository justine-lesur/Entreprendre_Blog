
<?php
session_start();

if(!isset($_SESSION['login']))
{
    header('Location: index.php');
}
else
{

?>


<!DOCTYPE html>

<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profil - Blog</title> <!-- Page pour accéder à son profil -->
    <link rel="stylesheet" href="blog.css">
</head>

<body>
	<section id="image-fond1">
   	 	<?php include("header.php"); ?>
		<section class="text">
		<div class="feuille-blanche">
    		<h1 class="welcome2">Mon profil</h1>

<?php

//Création de la connexion à la base de données
$connexion= mysqli_connect("localhost", "justine-lsr", "awJ3dZQz", "justine-lesur_blog");


    $id=$_SESSION["login"];
    //Préparation de la requête SQL
    $requete="SELECT * FROM utilisateurs WHERE login=\"$id\"" ;;

    //Execution de la requête SQL
    $query=mysqli_query($connexion,$requete);

    //Récupération du résultat de la requête
    $resultat=mysqli_fetch_all($query);

    // Récupération des informations de l'utilisateur sur la bdd
    $login_bdd=$resultat[0][1];
    $password_bdd=$resultat[0][2];

    ?>
		<article>
    		<h2 class="derniers-articles2">Modifier mon identifiant</h2>
    		<form method="post" action="profil.php">
    			<input type="text" name="identifiant_modif" class="largeur" placeholder="Nouvel identifiant" required>
    			<input type="password" name="password" class="largeur" minlength="5" placeholder="Confirmation du mot de passe" required>
    			<input type="submit" name="modif_login" class="bouton5" value="Envoyer">
		</article>
   			</form>
		</div>

    <?php

    //On vérifie que le formulaire a été envoyé
    if(isset($_POST["modif_login"]))
    {
        //On récupère les données du formulaire
        $password=$_POST["password"];
        $login_modif=$_POST["identifiant_modif"];

        //On vérifie que le nouvel identifiant est différent de l'ancien
        if($login_modif==$login_bdd)
        {
            ?><p class="voir-articles4">L'identifiant choisi est le même que le précédent. Veuillez en choisir un autre.</p><?php
        }
        else
        {
            //On vérifie si l'identifiant existe déjà dans la bdd
            $i=0 ; //initilisation du compteur
            foreach($resultat as $user)
                {
                if($login_modif==$user[1]) //si l'identifiant choisi existe déjà dans la bdd 
                    {
                    $i++; //on ajoute 1 au compteur
                    }
                }
            if($i!=0) //si le compteur est différent de 0 : l'identifiant est déjà pris
            {
                ?><p class="voir-articles4">L'identifiant choisi existe déjà. Veuillez en choisir un autre.</p><?php
            }
            else if(password_verify($password, $password_bdd)==false) //si le mdp du formulaire correspond à celui de la bdd : l'utilisateur est connecté

            //else if($password_bdd!=$password) //Si l'ancien mot de passe ne correspond pas à celui de la bdd
            {
                ?><p class="voir-articles4">Ancien mot de passe incorrect.</p><?php
            }
            else //On modifie les informations de l'utilisateur dans la bdd
            {
            //Préparation de la requête SQL pour màj les données dans la bdd
            $update="UPDATE utilisateurs SET login = \"$login_modif\" WHERE utilisateurs.login = \"$id\" ";

            //On modifie la variable de session avec l'ancien identifiant
            $_SESSION["login"]=$login_modif;
            $id=$login_modif;

            //Execution de la requête SQL pour màj les données dans la bdd
            $query_update=mysqli_query($connexion,$update);
            $requete="SELECT * FROM utilisateurs WHERE login=\"$login_modif\" " ;
            $query=mysqli_query($connexion,$requete);

            //Récupération du résultat de la requête
            $resultat=mysqli_fetch_all($query);
            $login_bdd=$login_modif;
            unset($_POST);
            ?><p class="voir-articles4">Votre identifiant a bien été modifié.</p><?php
            }
        }
    }
    ?>


    <article>
    	<h2 class="derniers-articles2">Modifier mon mot de passe</h2>
    	<form method="post" action="profil.php">
    		<input type="password" name="password" class="largeur" placeholder="Ancien mot de passe" required>
    		<input type="password" name="password_modif" class="largeur" placeholder="Nouveau mot de passe" required>
    		<input type="submit" name="modif_pwd" class="bouton5" value="Envoyer">
    	</form>
	</article>

    
    <?php
    

    //On vérifie que le formulaire a été envoyé
    if(isset($_POST["modif_pwd"]))
    { 
        //On récupère les données du formulaire
        $password=$_POST["password"];
        $password_modif=$_POST["password_modif"];

        if(password_verify($password,$password_bdd)==false)
        //Si l'ancien mot de passe ne correspond pas à celui de la bdd
        {
            ?><p class="voir-articles4">Ancien mot de passe incorrect.</p><?php
        }
        else if(password_verify($password_modif,$password_bdd))
        //Si le nouveau mdp est identique à l'ancien
        {
           ?><p class="voir-articles4">Le nouveau mot de passe est identique à l'ancien mot de passe. Veuillez en saisir un autre.</p><?php
        }
        else //On modifie les informations de l'utilisateur dans la bdd
        {
            //Préparation de la requête SQL pour màj les données dans la bdd
            $password_modif_hach=password_hash($password_modif, PASSWORD_BCRYPT,array('cost'=>6));
            $update="UPDATE utilisateurs SET password = \"$password_modif_hach\" WHERE utilisateurs.login = \"$id\" ";

            //Execution de la requête SQL pour màj les données dans la bdd
            $query_update=mysqli_query($connexion,$update);

            //Préparation de la requête SQL
            $requete="SELECT * FROM utilisateurs WHERE login=\"$id\"" ;

            //Execution de la requête SQL
            $query=mysqli_query($connexion,$requete);

            //Récupération du résultat de la requête
            $resultat=mysqli_fetch_all($query);
            $password=$password_modif;
            unset($_POST);
            ?><p class="voir-articles4">Votre mot de passe a bien été modifié.</p><?php
        }
    }
    ?>
	<article>
    	<h2 class="derniers-articles2">Me déconnecter</h2> 
    	<form method="post">
    		<input type="submit" name="deconnexion" class="bouton5" value="Déconnexion">
    	</form>
	</article>
    </section>
    <?php
    //On vérifie que le formulaire a été envoyé
    if(isset($_POST["deconnexion"]))
    {
        //On supprime la variable de session
        unset($_SESSION["$id"]);

        //On renvoit l'utilisateur vers la page d'accueil
         header("Location: deconnexion.php");
        exit(); 
    }
    ?>

    <section class="desinscription">
		<article>
    	<h2 class="derniers-articles2">Me désinscrire</h2> 
    	<form method="post">
    		<input type="password" name="password" id="password" class= "largeur" placeholder="Confirmation du mot de passe" required>
    		<input type="submit" name="desinscription" class="bouton5" value="Se désinscrire">
    	</form>
		</article>
		
    <?php
    //On vérifie que le formulaire a été envoyé
    if(isset($_POST["desinscription"]))
    {
        $password=$_POST["password"];
        //Si le mdp du formulaire correspond à celui de la bdd
        if(password_verify($password, $password_bdd)) 
        {
            //On supprime les messages et lesinformations de l'utilisateur dans la bdd
            //Préparation de la requête SQL pour màj les données dans la bdd
            $desinscription="DELETE messages,utilisateurs FROM messages INNER JOIN utilisateurs ON messages.id_utilisateur=utilisateurs.id WHERE utilisateurs.login = \"$id\"";

            //Execution de la requête SQL pour màj les données dans la bdd
            $query_desinsc=mysqli_query($connexion,$desinscription);

            //On supprime la variable de session
            unset($_SESSION["$id"]);

            //Récupération du résultat de la requête
            $resultat=mysqli_fetch_all($query);

            //On renvoit l'utilisateur vers la page d'accueil
            header("Location: index.php"); 
            exit();
        }
    }

//Fermeture de la connexion
mysqli_close($connexion);
?>
</section>
</section>
<?php
include("footer.php");
?>

</body>

</html>
<?php 
}
?>
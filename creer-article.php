<?php
session_start();

//Vérification que l'utilisateur est un administrateur/modérateur
if($_SESSION['id_droit'] != 42 and $_SESSION['id_droit'] != 1337)
{
    header('Location: index.php');
}
else
{
	?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Créer un article - Blog</title>
 <link rel="stylesheet" href="blog.css">
</head>

<body>
	<section id="image-fond1">
	<?php include("header.php"); ?>
		<section class="text">
		<form method="post" action="creer-article.php" class="formulairepages2" enctype="multipart/form-data">
			<h1 class="welcome2">Créer un article</h1>
			<input type="text" name="nom" class="largeur" placeholder="Nom de l'article" required>
			<textarea name="description" class="largeur2" id="description" placeholder="Description" required/></textarea>
			<br/>
			<?php
			//Récupération des catégories sur la BDD
			$connect = mysqli_connect('localhost','root','','blog') or die ('Error');
			$query = "SELECT * FROM categories";
			$requete = mysqli_query($connect,$query);
			$categories= mysqli_fetch_all($requete);
			mysqli_close($connect);
			?>
			<select name="tranches" class="largeur" id="niveau" required/>
			<option value="">Catégorie</option>
			<?php 
				foreach ($categories as $categorie)
				{
				?>
           		<option value="<?php echo $categorie[0]; ?>"><?php echo $categorie[1] ; ?></option>
				<?php 
				}
				?>
	    	</select>
			<br/>
            <input type="file" name="image" id="inp-img" required>
			<input type="submit" class="bouton2" class="link" name="valider"/>
		</form>
	<?php
if(isset($_POST["valider"]))
{
			var_dump("test");
			
    if(isset($_FILES['image']) && !empty($_FILES['image'])){
		var_dump("test2");
        $tailleMax = 2097152 ;
        $extensionsValides = $arrayName = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['image']['size'] <= $tailleMax) 
        {
			
			
            $extensionsUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
            if(in_array($extensionsUpload, $extensionsValides)) 
            {
                $chemin = "images/".$_FILES['image']['name'];
                            
                $deplacement = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                if($deplacement) 
                {
                    $img = "images/".$_FILES['image']['name'];
                }
                else
                {
                    $erreur = "Erreur durant l'importation de votre photo de profil" ;
                }
            }
            else
            {
                $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png. ";
            }

        }
        else
        {
            $erreur = "Votre photo de profil ne doit pas dépasser 2Mo" ;
        }
    }


    $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);
    $text = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);

	$id_utilisateur = $_SESSION['id_utilisateur'];
	$commentaire = strip_tags($_POST['description']);
	$commentaire2 = addslashes($commentaire);
	$tranches = $_POST['tranches'];
	var_dump($tranches);
	var_dump($nom);
	var_dump($commentaire2);
	var_dump($img);

    if(!empty($tranches) && !empty($nom) && !empty($commentaire2) && !empty($img)):

		$connect = mysqli_connect('localhost','root','','blog');
		$query = "INSERT INTO articles (nom, article, id_utilisateur, id_categorie, date, image) VALUES ('$nom', '$commentaire2', '$id_utilisateur', '$tranches', NOW(), '".$img."')";
		var_dump($query);
		$reg = mysqli_query($connect, $query);
		echo '<p class="voir-articles">Votre article a bien été posté</p>';
		$query2 = "SELECT LAST_INSERT_ID() FROM articles";
		$reg2 = mysqli_query($connect, $query2);
		$resultat = mysqli_fetch_assoc($reg2);
		mysqli_close($connect);
			
		echo "<a id='voir-articles3' href='article.php?id=", $resultat['LAST_INSERT_ID()'], "'>Votre article</a>";

    else:

        $erreur = "tous les champs doivent être completés";

    endif;
}

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

?>
	</section>
	</section>
	<?php include("footer.php"); ?>
</body>
</html>
<?php
}
?>
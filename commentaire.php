<?php $id_article=$_GET["id"];?>

			
			<form method="post" action="article.php?id=<?php echo $id_article ;?>" class="formulairepages">
			<h1 class="welcome3">Insérer un commentaire</h1>
			<textarea name="commentaire" class="largeur2" id="description" placeholder="Commentaire" required/></textarea>
			<input type="submit" class="bouton2" class="link" name="submit"/>
			</form>
		<?php
				if (!isset($_POST["submit"]))
				{}
				else
				{
				$commentaire = $_POST["commentaire"];
				$auteur=$_SESSION['id_utilisateur'];

				$commentaire2 = addslashes($commentaire);
					if($commentaire2!="")
					{
						$connexion = mysqli_connect('localhost','root','','blog');
						$requete4 = "INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date) VALUES ('$commentaire2','$id_article','$auteur',NOW())";
						$req4 = mysqli_query($connexion, $requete4);
						mysqli_close($connexion);
						header("location:article.php?id=$id_article");
						//$url = $_SERVER['REQUEST_URI'];
						//header("Location: ".$url);
					}
			  	}
        ?>
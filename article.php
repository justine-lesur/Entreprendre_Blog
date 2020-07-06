<?php
	session_start();
?>	
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="blog.css"/>
		<title>Article - Blog</title>
	</head>
	
	<body>
			<section id="image-fond1">
			<?php include("header.php"); ?>
				<section class="text">
				<?php
					date_default_timezone_set('Europe/Paris'); 
					$connexion = mysqli_connect('localhost','root','','blog');
					//Je sélectionne l'id de GET id (en gros l'id que j'utilise)
					$requete = "SELECT * FROM articles  WHERE id = '".$_GET['id']."'";
					$resultat = mysqli_query($connexion, $requete);
					//$donnees = id de GET id
					$donnees = mysqli_fetch_assoc($resultat);
					$id_utilisateur=$donnees['id_utilisateur'];
					
					//Je sélectionne le login de la table utilisateurs en récupérant l'id de l'id_utilisateur
					$requete2 = "SELECT login FROM utilisateurs WHERE id = '".$donnees['id_utilisateur']."'";
					$req = mysqli_query($connexion, $requete2);
					//$data = id de id_utilisateur
					$data = mysqli_fetch_assoc($req);
				
					$requete3 = "SELECT DATE_FORMAT(date,'%d-%m-%Y à %H:%i:%s') as date FROM articles WHERE id = '".$_GET['id']."'";
					$req3 = mysqli_query($connexion, $requete3);
					$date = mysqli_fetch_assoc($req3);
					$id_article = $_GET['id'];

				?>	
			<article class="partie-haut3">
			</article>
				<section class="feuille-blanche">
					<div class="reservation_page_info4"><?php echo $donnees['nom']; ?></div>
				<article class="donnees">
					<div class="column-1">
						<div class="reservation_page_info"><img src="<?php echo $donnees['image'];?>" class="img-article"></div>
					</div>
					<div class="column-2">
						<div class="reservation_page_info"><?php echo nl2br($donnees['article']); ?></div>
						<div class="reservation_page_info2"><?php echo "<p>Posté le : ", $date['date'], " par ", $data['login'], "</p>"; ?></div>
					</div>
				</article>
		<?php
			$connexion = mysqli_connect('localhost','root','','blog');
			$requete = "SELECT id_article, id_utilisateur,commentaire, DATE_FORMAT(date,'%d/%m/%Y à %H:%i:%s') as date FROM commentaires WHERE id_article = \"$id_article\" ORDER by id DESC";
			$resultat = mysqli_query($connexion, $requete);
			$commentaires = mysqli_fetch_all($resultat);
		?>
		<h1 class='welcome3'>Commentaires</h1>
		<?php

			if($commentaires==null)
			{
				?><div class='reservation_page_info'><p>Aucun commentaire</p></div><?php
			}
			else
			{
				foreach ($commentaires as $commentaire)
				{
						$requete = "SELECT login FROM utilisateurs WHERE id = '".$commentaire[1]."'";
						$req = mysqli_query($connexion, $requete);
						$data = mysqli_fetch_assoc($req);
						
						echo "<div class='reservation_page_info'><p>", $commentaire[2], "</p></div>"; 
						echo "<div class='reservation_page_info2'><p>Posté le ", $commentaire[3], " par ", $data['login'], "</p></div>";
				}
			}
		?>

		<?php
		if(!isset($_SESSION['login']))
		{
			?><div class='mdp2'><p class='voir-articles5'>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> pour ajouter un commentaire</p></div><?php
		}
		else
		{
			include ("commentaire.php");
		}

		?>
		</section>
		</section>
		</section>
			<?php include("footer.php"); ?>
	</body>	
</html>
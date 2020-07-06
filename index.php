<!doctype html>
<?php
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
<title>Accueil - Blog</title>
 <link rel="stylesheet" href="blog.css">
</head>

<body>
	<section id="image-fond1">
	<?php include("header.php"); ?>
		<section class="text">
		<article class="partie-haut">
		<h1 class="welcome">Parce qu'entreprendre,<br/> c'est bon pour la santé</h1>
		</article>
		<div class="feuille-blanche">
		<?php 
	
		//Affichage des 3 derniers articles
		$connexion = mysqli_connect('localhost','root','','blog');
		$requete="SELECT articles.id,nom,article,id_utilisateur,id_categorie,DATE_FORMAT(date,'%d/%m/%Y à %H:%i:%s') as date,utilisateurs.login, image FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ORDER by date DESC LIMIT 0,3";
		
		//On récupère les articles à afficher
		$resultat = mysqli_query($connexion,$requete);
		$articles = mysqli_fetch_all($resultat);

		foreach ($articles as $valeur)
		{
			if(strlen($valeur[2]) > 400)
			{
				$description = substr($valeur[2], 0, 400).'...';

			}
			else
				{
					$description = $valeur[2];
				}
			?>
			<article class="donnees">
				<div class="column-1">
					<div class="reservation_page_info"><img src="<?php echo $valeur[7];?>" class="img-article"></div>
				</div>
				<div class="column-2">
					<div class="reservation_page_info1"><?php echo $valeur[1]; ?></div>
					<div class="reservation_page_info"><?php echo $description; ?></div>
					<div class="reservation_page_info2"><p>Posté le <?php echo $valeur[5]; ?> par <?php echo $valeur[6]; ?></p></div>
					<a class="voir-article" href="article.php?id=<?php echo $valeur[0]; ?>">Voir l'article   →</a>
				</div>
			</article>
			<?php
		}
		mysqli_close($connexion);

		?>
		<article class="acces-article">
			<div class="bouton">
	 			<a class="link" href="articles.php?categorie=all&page=1"><p class="ensavoirplus">Voir tous les articles</p></a>
		</article>
		</div>
	</div>
</section>
</section>
<?php include("footer.php"); ?>
</body>
</html>
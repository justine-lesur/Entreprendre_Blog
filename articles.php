<?php
	session_start();
?>	
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="blog.css"/>
		<title>Tous les articles - Blog</title>
	</head>
	
	<body>
		<section id="image-fond1">
			<?php include("header.php"); ?>
			<section class="text">
			<article class="partie-haut2">
			<h1 class="welcome">Tous les articles</h1>
			</article>
			<form method="get" action="articles.php">
				<div class="feuille-blanche">
				<label for="categorie"><h2 class="derniers-articles">Trier par catégorie</h2></label>
				<?php

				//Récupération des catégories sur la BDD
				$connect = mysqli_connect('localhost','root','','blog') or die ('Error');
				$query = "SELECT * FROM categories";
				$requete = mysqli_query($connect,$query);
				$categories= mysqli_fetch_all($requete);
				mysqli_close($connect);
				?>				
				<select name="categorie" id="categorie" required/>
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
				<article class="acces-article">
					<input type="submit" class="bouton2" class="link" name="valider"/>
				</article>
			</form>


				<?php

				//Connexion à la bdd
				date_default_timezone_set('Europe/Paris'); 
				$connexion = mysqli_connect('localhost','root','','blog');

				//On récupère la catégorie d'articles choisie
				$categorie="all";
				if (isset($_GET['categorie'])) 
				{
					$_SESSION['categorie']=$_GET['categorie'];
				}
				
				if(isset($_SESSION['categorie']))
				{
					$categorie=$_SESSION['categorie'];
				}
				else
				{
					$categorie="all";
				}
				
				//On récupère le numéro de la page actuelle
				if (isset($_GET['page'])) 
				{
					$page = $_GET['page'];
				} 
				else 
				{
					$page = 1;
				}

				//On définit le nombre d'articles que l'on souhaite afficher par page
				$nb_art_par_page = 5;

				//On définit l'offset
				$offset = ($page-1) * $nb_art_par_page;

				//On trie les articles par catégorie et on compte le nombre d'articles
				if(strcmp($categorie,"all")=="true")
				{
					$total_pages = "SELECT COUNT(*) FROM articles";

					$requete2 = "SELECT articles.id,nom,article,id_utilisateur,id_categorie,DATE_FORMAT(date,'%d/%m/%Y à %H:%i:%s') as date,utilisateurs.login, image FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ORDER by date DESC LIMIT $offset, $nb_art_par_page";		
				}
				else
				{
					$total_pages = "SELECT COUNT(*) FROM articles WHERE id_categorie=$categorie";
					$requete2 = "SELECT articles.id,nom,article,id_utilisateur,id_categorie,DATE_FORMAT(date,'%d/%m/%Y à %H:%i:%s') as date,utilisateurs.login, image FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id WHERE id_categorie=$categorie ORDER by date DESC LIMIT $offset, $nb_art_par_page";
				}

				//On récupèree le nombre total d'articles
				$result = mysqli_query($connexion,$total_pages);
				$total_articles = mysqli_fetch_array($result)[0];

				//On calcule le nombre total de pages
				$total_pages = ceil($total_articles / $nb_art_par_page);

				//On récupère les articles à afficher
				$resultat = mysqli_query($connexion,$requete2);
				$articles = mysqli_fetch_all($resultat);

				foreach ($articles as $article)
				{
				if(strlen($article[2]) > 400)
			{
				$description = substr($article[2], 0, 400).'...';

			}
			else
				{
					$description = $article[2];
				}
					
					?>
					<article class="donnees">
						<div class="column-1">
							<div class="reservation_page_info"><img src="<?php echo $article[7];?>" class="img-article"></div>
						</div>
						<div class="column-2">
							<div class="reservation_page_info1"><?php echo $article[1]; ?></div>
							<div class="reservation_page_info"><?php echo $description ?></div>
							<div class="reservation_page_info2"><p>Posté le <?php echo $article[5]; ?> par <?php echo $article[6]; ?></p></div>
							<a class='voir-article' href="article.php?id=<?php echo $article[0]; ?>">Voir l'article →</a>
						</div>
					</article>
					<?php
				}
				mysqli_close($connexion);
			?>

			
			<section class="pagination">
				<ul class="tourner-page">
				<li><a class="categorie" href="?categorie=<?php echo $categorie ; ?>&page=1">1</a></li>
				<li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
					<a class="categorie" href="?categorie=<?php echo $categorie; if($page <= 1){ echo '#'; } else { echo "&page=".($page - 1); } ?>">< </a>
				</li>
				<li class="<?php echo $categorie; if($page >= $total_pages){ echo 'disabled'; } ?>">
					<a class="categorie" href="?categorie=<?php echo $categorie ; if($page >= $total_pages){ echo '#'; } else { echo "&page=".($page + 1); } ?>"> ></a>
				</li>
				<li><a class= "categorie" href="?categorie=<?php echo $categorie ; ?>&page=<?php echo $total_pages; ?>"><?php if($total_pages==0) echo $page ; else echo $total_pages ; ?></a></li>
				</ul>
			</section>
			</article>	
		</section>
		</section>
		</div>
				<?php include("footer.php"); ?>
		
	</body>	
</html>
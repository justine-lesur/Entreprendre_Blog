	<header>
		<p class="entreprendre">Journal <span class="red"> d'entrepreneur</span></p>
		<nav class="menu">
			<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="articles.php?categorie=all&page=1">Articles</a>
						</li>
				<?php
				 	if (!isset($_SESSION['login']))
					{
				?>		

						<li><a href="inscription.php">Inscription</a></li>
						<li><a href="connexion.php">Connexion</a></li>
				<?php
					}
					else
					{
				?>
						<li><a href="profil.php">Profil</a></li>
				<?php

						//On regarde si l'utilisateur connecté est modérateur ou administrateur
						$connect = mysqli_connect('localhost','root','','blog') or die ('Error');
						$query = "SELECT id_droits FROM utilisateurs WHERE login='".$_SESSION['login']."'";
						$reg = mysqli_query($connect,$query);
						$rows= mysqli_fetch_assoc($reg);
						mysqli_close($connect);

	
						if ($_SESSION['id_droit'] == 42 or $_SESSION['id_droit'] == 1337)
						{
							?><li><a href="creer-article.php">Créer un article</a><?php
						}
						if ($_SESSION['id_droit'] == 1337)
		
						{
							?><li><a href="admin.php">Admin</a><?php
						}
					?>
						<li><a href="deconnexion.php">Déconnexion</a></li>
				<?php
						}
				?>
			</ul>
		</nav>
	</header>
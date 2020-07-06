<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Connexion - Blog</title>
 <link rel="stylesheet" href="blog.css">
</head>

<body>
	<section id="image-fond1">
	<?php include("header.php"); ?>
	<section class="text">
		<form method="post" action="connexion.php" class="formulairepages">
			<h1 class="welcome7">Connexion</h1>
			<input type="text" name="login" class="largeur" placeholder="Login" required/>
			<input type="password" name="password" class="largeur" placeholder="Mot de passe" required/>
			<input type="submit" class="bouton2" name="valider"/>
		</form>
	
	<?php
		if (isset($_POST['valider']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			if ($login && $password)
			{
				$connect = mysqli_connect('localhost','root','','blog') or die ('Error');
				$query = "SELECT*FROM utilisateurs WHERE login='".$login."'";
				$reg = mysqli_query($connect,$query);
				$rows= mysqli_fetch_assoc($reg);
				mysqli_close($connect);
				
				if ($login == $rows ['login'])
                {
					if (password_verify($_POST['password'],$rows['password']))
					{
						$_SESSION['login']=$login;
						$_SESSION['password']=$password;
						$_SESSION['id_utilisateur']=$rows['id'];
						$_SESSION['id_droit']=$rows['id_droits'];
						header("location: articles.php?categorie=all&page=1");
					
					} else echo "<p class='voir-articles2'>Mot de passe incorrect</p>";
				
				} else echo "<p class='voir-articles2'>Login ou Mot de passe incorrect</p>";
			
			} else echo "<p class='voir-articles2'>Veuillez saisir tous les champs</p>";
		}
	?>
		</section>
	</section>
	<?php include("footer.php"); ?>
</body>
</html>
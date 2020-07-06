<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Inscription - Blog</title>
 <link rel="stylesheet" href="blog.css">
</head>

<body>
	<section id="image-fond1">
	<?php include("header.php"); ?>
	<section class="text">
	<h1 class="welcome2">Inscription</h1>
	<form method="post" action="inscription.php" class="formulairepages">
	<input type="text" name="login" class="largeur" placeholder="Login" required/>
	<input type="password" name="password" class="largeur" placeholder="Mot de passe" required/>
	<input type="password" name="repeatpassword" class="largeur" placeholder="Confirmer le Mot de Passe*" required/>
	<input type="email" name="email" class="largeur" placeholder="Email" required/>
	<input type="submit" class="bouton2" name="valider"/>
	</form>
	
	  <?php
	
	  $connect = mysqli_connect('localhost','root','','blog') or die ('Error');
	
		if (isset($_POST['valider']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$repeatpassword = $_POST['repeatpassword'];
			$mail = $_POST['email'];
			
			
			if ($login && $password && $repeatpassword && $mail)
			{
				
				if ($password == $repeatpassword)
				{
					$nouveaulogin = "SELECT * FROM utilisateurs WHERE login='".$login."'";
					$reg = mysqli_query($connect, $nouveaulogin);
                    $rows = mysqli_num_rows($reg);
					
					if ($rows==0)
					{
						$mdp = password_hash($_POST['password'], PASSWORD_BCRYPT,array ('cost'=> 12));
						$query = "INSERT INTO utilisateurs (login, password, email, id_droits) VALUES ('$login','$mdp','$mail','1')";
						mysqli_query($connect, $query);
                        header('location: connexion.php');
						
					} else echo '<p class="voir-articles2">Ce pseudo est indisponible</p>';
						
				} else echo '<p class="voir-articles2">Les deux mots de passe doivent être identiques</p>';
				
			} else echo '<p class="voir-articles2">Veuillez saisir tous les champs</p>';
		}
		?>
	</section>
	</section>
	<?php include("footer.php"); ?>
</body>
</html>

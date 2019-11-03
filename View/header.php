<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container">
    		<?php
			if (isset($_SESSION['username'])) {
				echo '<a class="navbar-brand" href="index.php?action=Profile">Profil de '.$_SESSION['username'].'</a>';
				echo '<a class="navbar-brand" href="index.php?action=accueil">Voir les Posts</a>';
				echo '<a class="navbar-brand" href="index.php?action=logout">Déconnexion</a>';
			}else{
				echo '<a class="navbar-brand" href="index.php?action=accueil">Voir les Posts</a>';
				echo '<a class="navbar-brand" href="index.php?action=connexion">Connexion</a>';
			}
    		?>
    	</div>
	</nav>
</header>

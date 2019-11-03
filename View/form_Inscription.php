<form method="post" action="index.php?action=newUser">
	<center>
		<br><br><br><br><br>
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td colspan="2"><center><h3>Inscription</h3></center></td>
			</tr>
			<tr>
				<td colspan="2">Nom/Psedo : 
					<input type="text" required id="user" placeholder="Username" name="user">
					<?php 
					if(isset($_GET['user']) && $_GET['user'] == "1") {
						echo "Ce psedo existe déjà, veuillez en choisir un autre.";
					} ?>
				</td>
			</tr>
			<tr>	
				<td>Mot de passe : 
					<input type="password" required id="mdp" placeholder="password" name="mdp">
				</td>
				<td>
					Confirmation de Mot de passe :
					<input type="password" required id="mdpconf" placeholder="confirm password" name="mdpconf">
					<?php 
					if(isset($_GET['mdp']) && $_GET['mdp'] == "1") {
						echo "Remplir deux fois le même mot de passe";
					} ?>
				</td>
				<!--<td>
					<center>
						<a href=''>mot de passe oublié</a>
					</center>
				</td>-->
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="submit" name="Inscription" value="Inscription">
					</center>
				</td>
			</tr>
		</table>
	</center>
</form>



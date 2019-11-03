<form method="post" action="index.php?action=verifyUser">
	<center>
		<br><br><br><br><br>
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td colspan="2"><center><h3>CONNEXION</h3></center></td>
			</tr>
			<tr>
				<td>Nom : 
					<input type="text" id="user" placeholder="Username" required name="user">
				</td>
				<td>Mot de passe : 
					<input type="password" id="mdp" placeholder="password" required name="mdp">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						Vous n'avez pas de compte ?<br>
					</center>
					<center>
						<a href="index.php?action=newUserForm">Inscription
						</a>
					</center>
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
						<input type="submit" name="Connection" value="Connexion">
					</center>
				</td>
			</tr>
		<?php
		if (isset($_SESSION['error_access_connection'])) {
			echo "<tr><td>";
			echo $_SESSION['error_access_connection'];
			echo "</td></tr>";
		}
		?>
		</table>
	</center>
</form>



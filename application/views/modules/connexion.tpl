
	<div class="containment">
		
		<h2>Connexion </h2>
		
			
			<form action="connexion.inc.php" method="post"> 
				  <div>
				    <label for="email">E-mail :</label>
				    <input type="text" id="email" name="user_name">
				  </div>

				  <div>
				    <label for="mdp">Mot de passe :</label>
				    <input type="password" name="mdp">
				  </div>
				<div>
					<a href= "inscription.html">Pas inscrit ?</a>
				</div>
				<div class="button">
				    <button type="submit" name="form_connexion"><b>Envoyer</b></button>
				</div>
					
			</form>
			
		
	</div>
 


{extends file="../layout.tpl"}

{block name="body"}

<div class="containment">

	<h2>Connexion </h2>

	<form action="" method="post">
		<div>
			<label for="email">E-mail :</label>
			<input type="text" id="email" name="user_name">
		</div>


		<div>
			<label for="mdp">Mot de passe :</label>     <input type="password" id="courriel" name="mdp">   </div>
		<div>
			<a href="?page=inscription">Pas inscrit ?</a>
		</div>
		<div class="button">
			<button type="submit"><b>Envoyer</b></button>
		</div>

	</form>


</div>

{/block}
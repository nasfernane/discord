<!-- background -->
<div class="logBackground"></div>

<!-- page de connexion -->
<div class="loginContainer">
    <h1>Ha, te revoilà !</h1>
    <h2>Nous sommes si heureux de te revoir !</h2>
    <form class="loginContainer__form" method="POST" action="/php/scripts/logUser.php">
        <!-- input e-mail -->
        <div class="loginContainer__form__field">
            <label for="loginEmail">e-mail</label>
            <input type="text" id="loginEmail" name="email"/>
        </div>
        <!-- input mot de passe -->
        <div class="loginContainer__form__field">
            <label for="loginPw">Mot de passe</label>
            <input type="password" id="loginPw" name="password">
        </div>
        <button class="loginContainer__form--btn" type="submit">Se connecter</button>
    </form>
    <!-- lien pour la page d'inscription -->
    <p>Besoin d'un compte ? <a href="?page=signup">S'inscrire</a></p>
</div>
<!-- background -->
<div class="logBackground"></div>

<!-- page d'inscription -->
<div class="signupContainer">
    <h1>Créer un compte</h1>
    <form class="signupContainer__form" method="POST" action="/php/scripts/createUser.php">
        <!-- input e-mail -->
        <div class="signupContainer__form__field">
            <label for="signUpEmail">e-mail</label>
            <input type="text" id="signUpEmail" name="email"/>
        </div>
        <!-- input nom utilisateurs -->
        <div class="signupContainer__form__field">
            <label for="signUpUser">Nom d'utilisateur</label>    
            <input type="text" id="signUpUser" name="user"/>
        </div>
        <!-- input mot de passe -->
        <div class="signupContainer__form__field">
            <label for="signUpPw">Mot de passe</label>
            <input type="password" id="signUpPw" name="password">
        </div>
        <button class="signupContainer__form--btn" type="submit">Continuer</button>
    </form>
    <!-- lien page de connexion -->
    <a href="?page=login">Tu as déjà un compte ?</a>
</div>
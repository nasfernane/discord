<div class="logBackground"></div>

<div class="signupContainer">
    <h1>Créer un compte</h1>
    <form class="signupContainer__form" method="POST" action="/php/scripts/createUser.php">
        <div class="signupContainer__form__field">
            <label for="signUpEmail">e-mail</label>
            <input type="text" id="signUpEmail" name="email"/>
        </div>
        <div class="signupContainer__form__field">
            <label for="signUpUser">Nom d'utilisateur</label>    
            <input type="text" id="signUpUser" name="user"/>
        </div>
        <div class="signupContainer__form__field">
            <label for="signUpPw">Mot de passe</label>
            <input type="password" id="signUpPw" name="password">
        </div>
        <button class="signupContainer__form--btn" type="submit">Continuer</button>
    </form>
    <a href="?page=login">Tu as déjà un compte ?</a>
</div>
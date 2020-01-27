<section class="registration">
    <div class="container">
        <div class="row">
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert" style="margin-left: 320px;padding: 20px 150px 20px 150px">
                    <a href="#" class="alert-link">Erreur</a>. Login existe déjà.
                </div>
            <?php endif ?>
            <div class="col-md-12" style="width: 300px;">
                <div class="registration-box">
                    <div class="reg-top">
                        <h3>Créer un compte.</h3>
                        <p>Créer un compte pour accéder à votre espace.</p>

                    </div>
                    <form class="reg-form" method="POST" onsubmit="return form()">
                        <div class="row">
                            <div class="col-md-6 name">
                                <label>Nom</label>
                                <input type="text" id="input" name="utilisateur[nom]" required="" pattern="[A-Za-z]{3,}" title="Ce champ doit être alphabétique">
                            </div>
                            <div class="col-md-6 srname">
                                <label>Prénom</label>
                                <input type="text" name="utilisateur[prenom]" required="" pattern="[A-Za-z]{3,}" title="Ce champ doit être alphabétique">
                            </div>
                            <div class="col-md-6 email">
                                <label>Email</label>
                                <input type="email" name="utilisateur[email]" required="">
                            </div>
                            <div class="col-md-6 email">
                                <label>Login</label>
                                <input type="text" name="utilisateur[login]" required="">
                            </div>

                            <div class="col-md-12 password">
                                <label>Mot de passe</label>
                                <input type="password" id="password" name="utilisateur[mdp]" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="il doit être composé de 8 caractére et par un au moin chiffre et un miniuscule et un majuscule ">
                            </div>
                            <div class="col-md-12 password">
                                <label>Confirmer mot de passe</label>
                                <input id="confirm" type="password" required="">
                                <p id="error" class="error text-center" style="margin: 5px 0 20px;">Les deux mot de passe ne sont pas correspondants</p>
                            </div>
                            <div class="col-md-6" style="margin-left: 100px;">
                                <button type="submit" id="button">Inscrire</button>
                            </div>
                        </div>
                    </form>
                    <div class="login-btm text-center">
                        <p>Vous avez déjà un compte? <a href="?route=connexion">Connecter-vous</a></p>
                    </div>
                    <script type="text/javascript">
                        var error = document.getElementById("error").style.display = 'none';
                        function form() {
                            var password = document.getElementById("password").value;
                            var confirm = document.getElementById("confirm").value;
                            if (password != confirm) {
                                document.getElementById("error").removeAttribute("style");
                                document.getElementById("password").style.borderColor = "red";
                                document.getElementById("confirm").style.borderColor = "red";
                                return false;
                            } else {
                                return true;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

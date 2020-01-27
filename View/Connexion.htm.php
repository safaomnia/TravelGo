<section class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="reg-top">
                        <h3>Bienvenue! </h3>
                        <p>Connecter à votre compte.</p>
                    </div>
                    <form class="login-form" method="POST" style="margin-top: 30px;">
                        <div class="row">
                            <div class="col-md-12 email">
                                <label>Email</label>
                                <input type="text" name="login">
                            </div>
                            <div class="col-md-12 password">
                                <label>Mot de passe</label>
                                <input type="password" name="mdp">
                            </div>
                            <?php if (isset($_GET['error'])): ?>
                                <p class="error col-md-12 text-center"><i class="fas fa-exclamation-triangle mr-2"></i>Email ou mot de passe incorrect
                            <?php endif ?>
                            <div class="col-md-6">
                                <button type="submit" name="client">Connexion(client)</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="agent">Connexion(agent)</button>
                            </div>
                        </div>
                    </form>
                    <div class="login-btm text-center">
                        <p>Vous n'avez pas un compte? <a href="?route=inscription"> Inscrire-vous</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
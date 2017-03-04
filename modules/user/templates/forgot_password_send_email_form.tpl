<div class="passwordBox animated fadeInDown">
        <div class="row">
            <div>
                <h1 class="logo-name">
                    <a href="">
                        <img src="{$j_basepath}commonlibraries/images/logo_pagesjaunes.mg.svg" class="img-responsive" />
                    </a>
                </h1>
            </div>

            <div class="col-md-12">
                <div class="ibox-content">
                    

                    <h2 class="font-bold">Mot de passe oublié</h2>

                    <p>
                        Veuillez entrer votre adresse email pour réinitialiser votre mot de passe.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t text-center" role="form" method="POST" action="{jurl 'user~auth:send_email'}">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>
                                <button type="submit" class="btn btn-primary m-b">Envoyer</button>
                                <a href="{jurl 'jauth~login:form'}" class="btn btn-white m-b">                    
                                    Annuler
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
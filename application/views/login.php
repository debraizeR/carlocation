<body class="ASW74X">

    <div class="card AX8W13 top-100 star-t50 p-2 shadow">
        <div class="card-body">


            <?php

            if (isset($this->session->error_login)) {
            ?>
                <span class="lien"><?= $this->session->error_login ?></span>
            <?php
                $this->session->unset_userdata("error_login");
            }
            if (isset($this->session->error_password)) {
            ?>
                <span class="lien"><?= $this->session->error_password ?></span>
            <?php
                $this->session->unset_userdata("error_password");
            }

            ?>

            
                <form method="post" action="form_valid_log">
                    <div class="col-sm-12">
                    <label for="login">Nom d'utilisateur</label>
                            <input type="text" name="login" id="login" class="form-control" placeholder="Votre nom d'utilisateur" aria-describedby="basic-addon2" required>

                    </div>

                    <div class="col-sm-12">   
                    <label for="login">Mot de passe</label>     
                            <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe" aria-describedby="basic-addon2" required>
                    </div>

                    <div class="col-sm-12">
                        <hr>
                        <input type="submit" name="loginConfirm" id="loginConfirm" class="btn btn-outline-primary mr-2 AD38XL" value="Se connecter">
                    </div>

                </form>
            </div>


        </div>
    </div>
</body>
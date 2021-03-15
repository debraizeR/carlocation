<?php

if(isset($this->session->error_login))
{
    ?>
    <span class="lien"><?= $this->session->error_login ?></span>
    <?php
    $this->session->unset_userdata("error_login");
}
if(isset($this->session->error_password))
{
    ?>
    <span class="lien"><?= $this->session->error_password ?></span>
    <?php
    $this->session->unset_userdata("error_password");
}

?>
<form method="post" action="form_valid_log">
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="login" required>
    <label for="password">Mot de passe</label>
    <input type="text" id="password" name="password" required>
    <input type="submit" class="btn btn-light" id="loginConfirm" name="loginConfirm">
</form>
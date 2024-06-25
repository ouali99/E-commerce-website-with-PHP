<form method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Courriel</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="mot_de_passe" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <?php
    if (isset($message)) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $message; ?>
        </div>
        <?php
    }
    ?>
    <input type="submit" class="btn btn-primary" name="submit" value="Se connecter"/>
</form>
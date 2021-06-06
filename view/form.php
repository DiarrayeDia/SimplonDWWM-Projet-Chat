<!-- Saisie de l'utilisateur : Pseudo + Commentaire + Submit-->
<form method="POST" action="index.php">
    <fieldset>
        <div class="row">
            <div class="form-group col-4">
                <label for="pseudo_fe" class="form-label mt-4" hidden>Pseudo</label>
                <input type="text" name="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>" class="form-control" id="pseudo_fe" aria-describedby="pseudo" placeholder="Entrez votre pseudo">
            </div>

            <div class="form-group col-8">
                <label for="message_fe" class="form-label mt-4" hidden>Message</label>
                <textarea class="form-control" id="message_fe" rows="3" placeholder="Entrez votre message"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>

    </fieldset>
</form>
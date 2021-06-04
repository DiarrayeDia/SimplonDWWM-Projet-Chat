<!-- Saisie de l'utilisateur : Pseudo + Commentaire + Submit-->
<form method="POST" action="index.php">
    <fieldset>
        <div class="row">
            <div class="form-group col-4">
                <label for="pseudo_fe" class="form-label mt-4" hidden>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo_fe" aria-describedby="pseudo" placeholder="Entrez votre pseudo" value="<?php if (isset($message)) echo htmlspecialchars($message['pseudo']); ?>">
            </div>

            <div class="form-group col-8">
                <label for="message_fe" class="form-label mt-4" hidden>Message</label>
                <textarea type="text" class="form-control" name="content" id="message_fe" rows="3" placeholder="Entrez votre message"><?php if (isset($message)) echo htmlspecialchars($message['content']); ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>

    </fieldset>
</form>
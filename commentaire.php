<form method="POST" action='Fonction-php&JS/envoie_com.php'>
    <label class="form_label">Commentaire :</label><br>
    <textarea name="valide_com"cols="30" rows="10" class="area-publication"></textarea>
    <br>
    <input type="text" id="id_topic" name="id_topic" value="<?php echo $_GET['id']?>" style="display:none">
    <button type="submit" name="submit" class="button">Publier le commentaire</button>
</form>

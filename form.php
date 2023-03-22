<?php
require 'sellerData.php';

asort($sellers);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de réclamation</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Formulaire de réclamation</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <p>Pour toute plainte concernant votre commande de papier, veuillez s'il vous plait remplir le formulaire suivant.</p>

        <form action="result.php" method="post">
            <div>
                <label for="companyName">Nom de votre entreprise : </label>
                <input type="text" id="companyName" name="companyName" required>
            </div>
            <div>
                <label for="contactName">Nom du contact : </label>
                <input type="text" id="contactName" name="contactName" required>
            </div>
            <div>
                <label for="contactEmail">Email du contact : </label>
                <input type="email" id="contactEmail" name="contactEmail" required>
            </div>

            <!--TODO 1 - Add the missing fields-->

            <div>
                <label for="contactMessage">Votre message : </label>
                <textarea name="contactMessage" id="contactMessage" rows="10"></textarea>
            </div>

            <div>
                <label for="image">Image : </label>
                <select name="image" id="image">
                    <?php foreach ($sellers as $shortName => $fullName) : ?>
                        <option value="<?= $shortName ?>"><?= $fullName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="buttonsLine">
                <button type="submit">Envoyer <img src="images/mail.png"></button>
            </div>
        </form>
    </main>

</body>

</html>
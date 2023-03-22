<?php
$errors = [];
require 'sellerData.php';

// TODO 3 - Get the data from the form and check for errors


foreach($_POST as $key => $value) {
    $contact[$key] = trim($value);
}

// $contact = array_map('trim', $_POST);

if(empty($contact['companyName'])) {
    $errors[] = 'Le nom de la compagnie est obligatoire';
}
if(empty($contact['contactName'])) {
    $errors[] = 'Le nom du contact est obligatoire';
}
$contactNameLength = 8;
if(strlen($contact['contactName']) > $contactNameLength) {
    $errors[] = 'Le nom de contact doit faire moins de ' . $contactNameLength . ' caractères';
}

if(empty($contact['contactEmail'])) {
    $errors[] = 'L\'email du contact est obligatoire';
}
if(!filter_var($contact['contactEmail'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'email du contact a un format incorrect';
}
if(empty($contact['contactMessage'])) {
    $errors[] = 'Le message est obligatoire';
}

$contactMessageLength = 10;
if(strlen($contact['contactMessage']) < $contactMessageLength) {
    $errors[] = 'Le message doit faire plus de ' . $contactMessageLength . ' caractères';
}

if(!key_exists($contact['image'],  $sellers )) {
    $errors[] = 'Le nom selectionné est incorrect';
}

if (!empty($errors)) {
    require 'error.php';
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif - Réclamation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Nous traitons votre retour.</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <div class="summary">
            <!-- BONUS -->
            <p>
                <img src="images/<?= $contact['image'] ?>.webp" alt="">
                <span>Votre vendeur</span>
            </p>
            

            <!-- TODO 2 - Replace those placeholders by the values sent from the form -->
            <ul>
                <li>Votre entreprise : <span><?= htmlentities($contact['companyName']) ?></span></li>
                <li>Votre nom : <span><?= htmlentities($contact['contactName']) ?></span></li>
                <li>Votre email : <span><?= htmlentities($contact['contactEmail']) ?></span></li>
                <li>Votre message :
                    <p><?= nl2br(htmlentities($contact['contactMessage'])) ?></p>
                </li>
            </ul>
        </div>
    </main>
</body>

</html>
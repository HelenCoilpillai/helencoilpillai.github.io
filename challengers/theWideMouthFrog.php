<?php
require_once("../init.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
$message = "";
$errorMessage = "";

$animal = new WideMouthFrog();
$errors = new Errors();

if (isset($_POST['btnSubmit'])) {
    $animalName = preg_replace('/\s+/', '', $_POST['animal']);
    if (
        $errors->validateForEmptyValue($animalName) === false
        || $errors->validateForSpecialCharacters($animalName) === false
    ) {
        $errorMessage = $errors->errorMessages;
    } else {
        $mouthSize = $animal->getMouthSize($animalName);
        $message = "The {$_POST['animal']}s' mouth is {$mouthSize}!";
    }
}
?>

<head>
    <title>
        The Wide Mouth Frog
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1>
    The Wide Mouth Frog
</h1>

<div>
    <?php
    echo $message;
    ?>
</div>

<div class="errorMessage">
    <?php
    echo $errorMessage;
    ?>
</div>

<form action="theWideMouthFrog.php" method="post">
    <div class="form-group">
        <label>Animal: </label>
        <input id="textInputAnimal" name="animal" type="text">
        <br>
        <button id="btnBack" name="btnBack">
            <a href="../index.html">
                Back
            </a>
        </button>
        <input id="btnSubmit" name="btnSubmit" type="submit">
    </div>
    <form>
</body>
</html>
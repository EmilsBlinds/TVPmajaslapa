<form action="contact.php" method="post">
    <label for="text">
        <input id="text" type="text" placeholder="text input" name="vards">
    </label>
    <input type="passowrd" placeholder="enter password here" name="parole">
    <input type="date" placeholder="date" name="datums">
    <input type="submit">
</form>

<?php

use App\ContactForm;

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $firstname = filter_var($_POST[ContactForm::FORM_FIELD_FIRSTNAME],FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST[ContactForm::FORM_FIELD_LASTNAME],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST[ContactForm::FORM_FIELD_PASSWORD],FILTER_SANITIZE_STRING);
        $date = filter_var($_POST[ContactForm::FORM_FIELD_DATE],FILTER_SANITIZE_STRING);

        $respone = sprintf("Result: %s, %s, %s", $name, $password, $date);

        echo $respone;
    }

    $connection = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$sql = $connection->prepare(
    "INESRT INTO (
        {${ContactForm::FORM_FIELD_FIRSTNAME}},
        {${ContactForm::FORM_FIELD_LASTNAME}},
        {${ContactForm::FORM_FIELD_PASSWORD}},
        {${ContactForm::FORM_FIELD_DATE}}
        )
        VALUES (?,?,?,?)"
);

if (!$sql) {
    die($connection->error);    
}

$sql->bind_param("ssss", $firstname, $lastname, $password, $date);
if (!$sql) {
    die($connection->error);
}

$sql->execute();
$sql->close();

echo "2k"


?>
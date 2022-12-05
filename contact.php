<form action="/TVPmajaslapa/contact.php" method="post">
    <label for="text">
        <input id="text" type="text" placeholder="text input" name="vards">
    </label>
    <input type="passowrd" placeholder="enter password here" name="parole">
    <input type="date" placeholder="date" name="datums">
    <input type="submit">
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $name = $_POST['vards'];
        $password = $_POST['parole'];
        $date = $_POST['datums'];

        $respone = sprintf("Result: %s, %s, %s", $name, $password, $date);

        echo $respone;
    }

?>
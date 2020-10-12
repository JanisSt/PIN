<?php
require_once 'PIN.php';
session_start();
$digit = $_POST['pin'];
$_SESSION['user'] = $_SESSION['user'] . $digit;
$PIN = new PIN();
$PIN->getPIN()

?>

<html lang="en">
<body>
<link rel="stylesheet" href="style.css">

<form action="/" method="post">

    <div class="grid-container">
        <div class="pass">
            <?php if (($_SESSION['user']) === $PIN->getPIN()) {
                echo 'UNLOCKED';
            };
            if (strlen($_SESSION['user']) >= '4' && $_SESSION['user'] != $PIN->getPIN()) {
                echo "INCORRECT please" . PHP_EOL;
                sleep(2); ?>
                <a href="logout.php">LOG OUT</a>
                <?php
            }
            ?>
        </div>
        <div class="stars"><?= ($_SESSION['user']) ?></div>
        <button class="grid-item" type="submit" name="pin" value="1">1</button>
        <button class="grid-item" type="submit" name="pin" value="2">2</button>
        <button class="grid-item" type="submit" name="pin" value="3">3</button>
        <button class="grid-item" type="submit" name="pin" value="4">4</button>
        <button class="grid-item" type="submit" name="pin" value="5">5</button>
        <button class="grid-item" type="submit" name="pin" value="6">6</button>
        <button class="grid-item" type="submit" name="pin" value="7">7</button>
        <button class="grid-item" type="submit" name="pin" value="8">8</button>
        <button class="grid-item" type="submit" name="pin" value="9">9</button>
    </div>
</form>

<a href="logout.php">RESTART</a>

</body>
</html>